<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login', [
        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->only('email', 'password');
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'El email es requerido',
            'email.email' => 'El email no es válido',
            'password.required' => 'La contraseña es requerida',
        ]);

        if(Auth::attempt($credentials)){
            return redirect()->intended(route('noticias.index'))
            ->with('feedback.message', 'Bienvenido de nuevo ' . Auth::user()->name);
        }

        return redirect()->back()->withInput()->with('feedback.message', 'Credenciales incorrectas');

    }

    public function register(){
        return view('auth.register');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|string|email|max:255|unique:users',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ],[
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe ser un texto',
            'name.max' => 'El nombre debe tener como máximo 255 caracteres',
            'name.min' => 'El nombre debe tener al menos 3 caracteres',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email no es válido',
            'email.max' => 'El email debe tener como máximo 255 caracteres',
            'email.unique' => 'Este email ya está registrado',
            'telefono.max' => 'El teléfono debe tener como máximo 20 caracteres',
            'direccion.max' => 'La dirección debe tener como máximo 255 caracteres',
            'password.required' => 'La contraseña es requerida',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        return redirect()->route('auth.login')
            ->with('feedback.message', 'Cuenta creada exitosamente. Ahora puedes iniciar sesión.');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login')->with('feedback.message', 'Sesión cerrada correctamente');
    }
}
