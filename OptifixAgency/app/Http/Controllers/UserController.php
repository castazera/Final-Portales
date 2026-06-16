<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('home')->with('feedback.error', 'No tienes permisos para ver la lista de usuarios.');
        }
        $usuarios = User::with('servicios')->get();
        return view('lista_user', compact('usuarios'));
    }
}
