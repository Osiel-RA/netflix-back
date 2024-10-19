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

    public function index()  // Obtiene perfiles 
    {
        $user = auth()->user();
        $profiles = Profile::where('user_id', $user->id)->get();

        return view('profiles.index', compact('profiles'));
    }

    public function edit($id) 
    {
        $profile = Profile::findOrFail($id);
        return view('profiles.form-profile', compact('profile'));
    }

    public function destroy($id) 
    {
        $profile = Profile::findOrFail($id); 
        $profile->delete(); 
        return redirect()->route('select-profile')->with('success', 'Perfil eliminado correctamente.'); 
    }


    public function update(Request $request, $id)  
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $profile = Profile::findOrFail($id);
        $profile->name = $request->input('name');
        $profile->save();

        return redirect()->route('profiles.select')->with('success', 'Perfil actualizado correctamente.');
    }

    public function select()
    {
        $user = auth()->user();
        $profiles = Profile::where('user_id', $user->id)->get();
        return view('profiles.select-profile', compact('profiles'));
    }
}
