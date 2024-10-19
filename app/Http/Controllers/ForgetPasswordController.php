<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller {
    public function forgetPassword() {
        return view('auth.email-forgot-password');
    }

    public function forgetPasswordPost(Request $request) {
        $request->validate([
            'email'=> 'required|email'
        ]);
        // Buscar el usuario por el correo electrónico
        $user = User::where('username', $request->email)->first();

        // Si el usuario no existe, devolver un error
        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Este correo no esta registrado']);
        }
        $token= Str::random(64);

        DB::table('password_reset_token')->insert([
            'username'=> $request->email,
            'token'=> $token,
            'created_at'=> Carbon::now()
        ]);

        // Intentar enviar el correo, y capturar cualquier error
        try {
            Mail::send('auth/emails/forget-password', ['token' => $token, 'email' => $request->email], function($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password');
            }); // Si se envió correctamente, redirigir con un mensaje de éxito  
            return redirect()->route('forget-password')->with('status', '¡Hemos enviado la solicitud a tu correo!');
        
        } catch (\Exception $e) {   
            DB::table('password_reset_token')->where('username', $request->email)->delete();// Si ocurre un error, eliminar el token y mostrar un mensaje de error
            return redirect()->back()->withErrors(['email' => 'Hubo un problema enviando el correo. Por favor, inténtalo de nuevo.']);
        }
    }

    public function resetPassword($token, Request $request) {
        $email = $request->query('email');
        return view('auth.forgot-password', compact('token', 'email'));
    }

    public function resetPasswordPost(Request $request) {
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|min:8|confirmed',
            'password_confirmation'=> 'required|min:8'
        ]);

        $updatePassword= DB::table('password_reset_token')->where([
            'username'=> $request->email,
            'token'=> $request->token
        ])->first();

        if (!$updatePassword) {
            return redirect()->to(route('reset-password'));
        }

        User::where('username', $request->email)->update(['password'=> Hash::make($request->password)]);

        DB::table('password_reset_token')->where(['username'=> $request->email])->delete();

        return redirect()->route('login-user')->with('status', '¡Contraseña cambiada con éxito! Por favor, ingresa con tu nueva contraseña.');

    }
}
