<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Muestra el perfil del usuario autenticado.
     */
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    /**
     * Muestra el formulario para editar el perfil.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Actualiza la información del perfil.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'current_password' => 'nullable|required_with:password|string',
            'password' => 'nullable|string|min:8|confirmed',
        ],[
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe tener al menos 3 caracteres',
            'name.max' => 'El nombre debe tener como máximo 255 caracteres',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email no es válido',
            'email.unique' => 'Este email ya está en uso por otro usuario',
            'telefono.max' => 'El teléfono debe tener como máximo 20 caracteres',
            'direccion.max' => 'La dirección debe tener como máximo 255 caracteres',
            'current_password.required_with' => 'Debes ingresar tu contraseña actual para cambiarla',
            'password.min' => 'La nueva contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',
        ]);

        // Si el usuario quiere cambiar la contraseña, verificar la actual
        if ($request->filled('password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->withErrors(['current_password' => 'La contraseña actual es incorrecta'])->withInput();
            }
            $user->password = Hash::make($request->password);
        }

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->telefono = $validated['telefono'];
        $user->direccion = $validated['direccion'];
        $user->save();

        return redirect()->route('perfil.show')->with('feedback.message', 'Perfil actualizado correctamente');
    }
}
