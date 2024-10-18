<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Language; 

class ProfileController extends Controller
{
    public function create()
    {
        return view('profiles.create-profile');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:50',
    ]);

    // Verificar si el usuario autenticado es accesible
    $user = auth()->user();
    if (!$user) {
        return redirect()->back()->withErrors('No se encontró un usuario autenticado.');
    }

    // Verificar si el usuario ya tiene 5 perfiles
    $profileCount = Profile::where('user_id', $user->id)->count();
    if ($profileCount >= 5) {
        return redirect()->back()->withErrors('Ya has alcanzado el límite de 5 perfiles.');
    }

    // Crear perfil si el usuario está autenticado y no ha alcanzado el límite
    Profile::create([
        'name' => $request->input('name'),
        'user_id' => $user->id, 
        'language_id' => 1, 
        'classification_id' => 1, 
        'status_id' => 1, 
    ]);

    return redirect()->route('select-profile');
}


public function index()
{
    // Obtiene todos los perfiles del usuario autenticado
    $user = auth()->user();
    $profiles = Profile::where('user_id', $user->id)->get();

    return view('profiles.index', compact('profiles'));
}

public function edit($id)
{
    // Encuentra el perfil por ID
    $profile = Profile::findOrFail($id);
    
    // Obtener todos los idiomas
    $languages = Language::all();

    return view('profiles.form-profile', compact('profile', 'languages')); // Pasamos los idiomas a la vista
}


public function destroy($id)
{
    $profile = Profile::findOrFail($id); // Encuentra el perfil por ID

    // Verifica cuántos perfiles tiene el usuario
    $user = auth()->user();
    $profileCount = Profile::where('user_id', $user->id)->count();

    // Si solo queda un perfil, no permitir eliminar
    if ($profileCount <= 1) {
        return redirect()->route('profiles.index')->withErrors('No puedes eliminar el último perfil.');
    }

    $profile->delete(); // Elimina el perfil

    return redirect()->route('profiles.index')->with('success', 'Perfil eliminado correctamente.'); // Redirige a la vista de selección de perfiles
}



public function update(Request $request, $id)
{
    // Validación
    $request->validate([
        'name' => 'required|string|max:255',
        'language_id' => 'required|exists:language,id', // Validación para el idioma
    ]);

    // Buscar el perfil por ID y actualizar
    $profile = Profile::findOrFail($id);
    $profile->name = $request->input('name');
    $profile->language_id = $request->input('language_id'); // Actualizar el idioma
    $profile->save();

    // Redirigir a la vista de selección de perfiles
    return redirect()->route('profiles.select')->with('success', 'Perfil actualizado correctamente.');
}



public function select()
{
    // Obtener todos los perfiles del usuario autenticado
    $user = auth()->user();
    $profiles = Profile::where('user_id', $user->id)->get();

    return view('profiles.select-profile', compact('profiles'));
}
 
public function selectImage($id)
{
    $profile = Profile::findOrFail($id); // Obtiene el perfil por ID
    return view('profiles.select-profile-image', compact('profile'));
}


public function updateImage(Request $request, $id)
{
    // Validar la solicitud
    $request->validate([
        'image_url' => 'required|string',
    ]);

    // Buscar el perfil
    $profile = Profile::findOrFail($id);
    $profile->image_url = $request->image_url;
    $profile->save();

    // Redirigir a la vista de selección de perfiles
    return redirect()->route('profiles.select')->with('success', 'Imagen de perfil actualizada correctamente.');
}

}
