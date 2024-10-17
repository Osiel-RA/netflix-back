<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\Payment;

class LoginController extends Controller
{
    public function selectProfile()
    {
        if (Auth::check()) {
            $user = auth()->user();
            $profiles = Profile::where('user_id', $user->id)->get(); // Obtiene los perfiles actualizados
    
            return view('profiles.select-profile', compact('profiles')); // Pasa los perfiles a la vista
        }
        
        return redirect()->route('login');
    }
    
    public function forgotPassword()
    {
        return view('auth/forgot-password');
    }


    public function showNetflix()
    {
        if (Auth::check()) {
            return view('home');
        }
        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|email',
            'password' => 'required',
        ]);

        // Buscar el usuario por su nombre de usuario
        $user = User::where('username', $credentials['username'])->first();

        if (!$user) {
            return back()->withErrors([
                'username' => 'No se ha encontrado un usuario registrado con este correo electrónico.',
            ]);
        }

        // Verificar si la contraseña es correcta
        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'password' => 'La contraseña ingresada es incorrecta.',
            ]);
        }
        // Autenticar al usuario
        Auth::login($user, $request->has('remember'));

        // Regenerar la sesión
        $request->session()->regenerate();
        // Verificar si el usuario tiene un pago activo en los últimos 30 días
        $payment = Payment::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$payment || $payment->created_at->diffInDays(now()) > 30) {
            // Si no tiene un pago reciente o si su pago tiene más de 30 días, redirigirlo a seleccionar un plan
            return redirect()->route('membership.select-plan')
                ->with('status', 'Tu suscripción ha expirado. Selecciona un plan para continuar.');
        }

        

        // Redirigir al perfil del usuario
        return $this->selectProfile();
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', '¡Has cerrado sesión correctamente!');
    }
}
