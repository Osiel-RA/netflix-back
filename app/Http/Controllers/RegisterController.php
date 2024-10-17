<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request) 
    {
        $request->validate([
            'name' => 'required|string|max:50', //no mas de 50... asi esta en la bd
            'username' => 'required|email|unique:user,username', //no se puede repetir email
            'phone' => 'required|numeric|digits:10|unique:user,phone', //no puedes repetir telefonos, tienen que tener 10 caracteres
            'password' => 'required|string|min:8', //contraseñas + de 8 caracteres
            
        ]);

        $user = new User();// Crear nuevo usuario
        $user->name = $request->name;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->password = $request->password; //A la contraseña se le aplica el HASH en el modelo
        $user->status_id = 1; 
        
        if ($user->save()) {// Guardar el usuario en la base de datos
            session()->put('username', $request->username);   // Guardar el email en la sesión
            
            $profile = new Profile();  // Crear el perfil solo si el usuario se ha guardado correctamente
            $profile->name = $user->name; 
            $profile->language_id = 1;  
            $profile->user_id = $user->id;  // El ID del usuario ya debería estar asignado aquí
            $profile->classification_id = 1; 
            $profile->status_id = 1;

            if ($profile->save()) {// Guardar el perfil en la base de datos
                
                Auth::login($user, $request->has('remember')); //!! temporal
                $request->session()->regenerate();
                return redirect()->route('check-email-register')->with('success', 'Usuario registrado y sesión iniciada correctamente.');
            }else{
                return redirect()->back()->with('error', 'No se pudo registrar el perfil del usuario.');
            }
        } else {
            return redirect()->back()->with('error', 'No se pudo registrar el usuario.');
        }
    }
}
