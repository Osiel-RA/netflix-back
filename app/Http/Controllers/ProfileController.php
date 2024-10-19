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
    $user = auth()->user();
    if (!$user) {
        return redirect()->back()->withErrors('No se encontró un usuario autenticado.');
    }
    $profileCount = Profile::where('user_id', $user->id)->count();
    if ($profileCount >= 5) {
        return redirect()->back()->withErrors('Ya has alcanzado el límite de 5 perfiles.');
    }
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
    $user = auth()->user();
    $profiles = Profile::where('user_id', $user->id)->get();

    return view('profiles.index', compact('profiles'));
}
public function edit($id)
{
    $profile = Profile::findOrFail($id);
    $languages = Language::all();
    return view('profiles.form-profile', compact('profile', 'languages')); 
}
public function destroy($id)
{
    $profile = Profile::findOrFail($id); 
    $user = auth()->user();
    $profileCount = Profile::where('user_id', $user->id)->count();
    if ($profileCount <= 1) {
        return redirect()->route('profiles.index')->withErrors('No puedes eliminar el último perfil.');
    }
    $profile->delete(); 
    return redirect()->route('profiles.index')->with('success', 'Perfil eliminado correctamente.'); 
}
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'language_id' => 'required|exists:language,id', 
    ]);
    $profile = Profile::findOrFail($id);
    $profile->name = $request->input('name');
    $profile->language_id = $request->input('language_id'); 
    $profile->save();
    return redirect()->route('profiles.select')->with('success', 'Perfil actualizado correctamente.');
}
public function select()
{
    $user = auth()->user();
    $profiles = Profile::where('user_id', $user->id)->get();
    return view('profiles.select-profile', compact('profiles'));
}
public function selectImage($id)
{
    $profile = Profile::findOrFail($id); 
    return view('profiles.select-profile-image', compact('profile'));
}
public function updateImage(Request $request, $id)
{
    $request->validate([
        'image_url' => 'required|string',
    ]);
    $profile = Profile::findOrFail($id);
    $profile->image_url = $request->image_url;
    $profile->save();
    return redirect()->route('profiles.select')->with('success', 'Imagen de perfil actualizada correctamente.');
}

}
