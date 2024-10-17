<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

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

    // Crear perfil si el usuario está autenticado
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

    return view('profiles.form-profile', compact('profile')); // Asegúrate de que form-profile.blade.php exista
}

public function destroy($id)
{
    $profile = Profile::findOrFail($id); // Encuentra el perfil por ID
    $profile->delete(); // Elimina el perfil

    return redirect()->route('select-profile')->with('success', 'Perfil eliminado correctamente.'); // Redirige a la vista de selección de perfiles
}


public function update(Request $request, $id)
{
    // Validación
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Buscar el perfil por ID y actualizar
    $profile = Profile::findOrFail($id);
    $profile->name = $request->input('name');
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



}
