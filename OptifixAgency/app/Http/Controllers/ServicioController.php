<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ServicioController extends Controller
{
    public function services()
    {
        $servicios = Servicio::where('estado', 'activo')->get();
        return view('services', ['servicios' => $servicios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        if (!$user || !$user->isAdmin()) {
            return redirect()->route('home')->with('feedback.error', 'No tienes permisos para realizar esta acción.');
        }
        return view('servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if (!$user || !$user->isAdmin()) {
            return redirect()->route('home')->with('feedback.error', 'No tienes permisos para realizar esta acción.');
        }
        $request->merge([
            'estado' => strtolower($request->estado)
        ]);
        $validated = $request->validate([
            'nombre' => 'required|string|min:3|max:255',
            'descripcion' => 'required|string',
            'detalles' => 'required|string',
            'categoria' => 'required|string|max:100',
            'precio' => 'nullable|numeric|min:0',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'estado' => 'in:activo,inactivo',
        ],[
            'nombre.required' => 'El nombre es requerido',
            'nombre.string' => 'El nombre debe ser un texto',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres',
            'nombre.max' => 'El nombre debe tener como máximo 255 caracteres',
            'descripcion.required' => 'La descripción es requerida',
            'descripcion.string' => 'La descripción debe ser un texto',
            'detalles.required' => 'Los detalles son requeridos',
            'detalles.string' => 'Los detalles deben ser un texto',
            'categoria.required' => 'La categoría es requerida',
            'categoria.string' => 'La categoría debe ser un texto',
            'categoria.max' => 'La categoría debe tener como máximo 100 caracteres',
            'precio.numeric' => 'El precio debe ser un número',
            'precio.min' => 'El precio no puede ser negativo',
            'estado.in' => 'El estado debe ser activo o inactivo',
        ]);

        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('servicios', 'public');
            $validated['imagen'] = $rutaImagen;
        }

        Servicio::create($validated);

        return redirect()->route('services')->with('feedback.message', "El servicio <b>" .e( $validated["nombre"] )."</b> fue creado correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $servicio = Servicio::with('precios')->findOrFail($id);
        return view('servicios.show', ['servicio' => $servicio]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Auth::user();
        if (!$user || !$user->isAdmin()) {
            return redirect()->route('home')->with('feedback.error', 'No tienes permisos para realizar esta acción.');
        }
        return view('servicios.edit', ['servicio' => Servicio::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        if (!$user || !$user->isAdmin()) {
            return redirect()->route('home')->with('feedback.error', 'No tienes permisos para realizar esta acción.');
        }
        $request->merge([
            'estado' => strtolower($request->estado)
        ]);
        $validated = $request->validate([
            'nombre' => 'required|string|min:3|max:255',
            'descripcion' => 'required|string',
            'detalles' => 'required|string',
            'categoria' => 'required|string|max:100',
            'precio' => 'nullable|numeric|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'estado' => 'in:activo,inactivo',
        ],[
            'nombre.required' => 'El nombre es requerido',
            'nombre.string' => 'El nombre debe ser un texto',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres',
            'nombre.max' => 'El nombre debe tener como máximo 255 caracteres',
            'descripcion.required' => 'La descripción es requerida',
            'descripcion.string' => 'La descripción debe ser un texto',
            'detalles.required' => 'Los detalles son requeridos',
            'detalles.string' => 'Los detalles deben ser un texto',
            'categoria.required' => 'La categoría es requerida',
            'categoria.string' => 'La categoría debe ser un texto',
            'categoria.max' => 'La categoría debe tener como máximo 100 caracteres',
            'precio.numeric' => 'El precio debe ser un número',
            'precio.min' => 'El precio no puede ser negativo',
            'estado.in' => 'El estado debe ser activo o inactivo',
        ]);

        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('servicios', 'public');
            $validated['imagen'] = $rutaImagen;
        }

        Servicio::where('id', $id)->update($validated);
        return redirect()->route('services')->with('feedback.message', "El servicio <b>" .e( $validated["nombre"] )."</b> fue actualizado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::user();
        if (!$user || !$user->isAdmin()) {
            return redirect()->route('home')->with('feedback.error', 'No tienes permisos para realizar esta acción.');
        }
        Servicio::where('id', $id)->delete();
        return redirect()->route('services')->with('feedback.message', "El servicio fue eliminado correctamente");
    }

    /**
     * Show delete confirmation page.
     */
    public function delete($id)
    {
        $user = Auth::user();
        if (!$user || !$user->isAdmin()) {
            return redirect()->route('home')->with('feedback.error', 'No tienes permisos para realizar esta acción.');
        }
        return view('servicios.delete', ['servicio' => Servicio::findOrFail($id)]);
    }

    /**
     * Permite a un usuario autenticado adquirir un servicio.
     */
    public function adquirir(Request $request, $id)
    {
        $servicio = Servicio::findOrFail($id);
        $user = Auth::user();

        $existente = $user->servicios()->where('servicio_id', $servicio->id)->first();

        // Si ya lo tiene activo, no puede volver a adquirirlo
        if ($existente && $existente->pivot->estado === 'activo') {
            return redirect()->back()->with('feedback.error', '¡Ya has adquirido este servicio!');
        }

        // Buscar el precio según la duración seleccionada
        $duracion = $request->input('duracion_meses', 6);
        $servicioPrecio = $servicio->precios()->where('duracion_meses', $duracion)->first();
        $precioFinal = $servicioPrecio ? $servicioPrecio->precio : $servicio->precio;

        $pivotData = [
            'fecha_adquisicion' => now(),
            'duracion_meses' => $duracion,
            'precio_pagado' => $precioFinal,
            'estado' => 'activo',
        ];

        if ($existente) {
            // Si estaba cancelado, actualizamos el registro existente
            $user->servicios()->updateExistingPivot($servicio->id, $pivotData);
        } else {
            $user->servicios()->attach($servicio->id, $pivotData);
        }

        return redirect()->back()->with('feedback.message', '¡Servicio adquirido con éxito!');
    }
}
