<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuscripcionController extends Controller
{
    /**
     * Muestra los servicios adquiridos por el usuario autenticado.
     */
    public function index()
    {
        $user = Auth::user();
        $servicios = $user->servicios()->get();
        return view('suscripciones.index', compact('servicios'));
    }

    /**
     * Cancela un servicio adquirido (cambia el estado a cancelado).
     */
    public function cancel($id)
    {
        $user = Auth::user();

        // Verificar que el usuario tiene este servicio
        if (!$user->servicios()->where('servicio_id', $id)->exists()) {
            return redirect()->route('suscripciones.index')->with('feedback.error', 'No tienes este servicio adquirido.');
        }

        // Cambiar el estado a cancelado en la tabla pivot
        $user->servicios()->updateExistingPivot($id, ['estado' => 'cancelado']);

        return redirect()->route('suscripciones.index')->with('feedback.message', 'El servicio fue cancelado correctamente.');
    }
}
