<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class LoginController extends Controller
{
    public function forgotPassword()
    {
        return view('auth/forgot-password');
    }

    public function selectProfile()
    {
        if (Auth::check()) {
            $user = auth()->user();
            $profiles = Profile::where('user_id', $user->id)->get(); // Obtiene los perfiles actualizados
    
            return view('profiles.select-profile', compact('profiles')); // Pasa los perfiles a la vista
        }
        return redirect()->route('login');
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

        $user = User::where('username', $credentials['username'])->first();

        if (!$user) {
            return back()->withErrors([
                'username' => 'No se ha encontrado un usuario registrado con este correo electrónico.',
            ]);
        }
        
        // Verificar si la contraseña ingresada coincide con la contraseña cifrada en la base de datos
        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'password' => 'La contraseña ingresada es incorrecta.',
            ]);
        }

        Auth::login($user, $request->has('remember'));

        $request->session()->regenerate();

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
