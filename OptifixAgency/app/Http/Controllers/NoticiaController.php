<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allNoticias = Noticia::all();
        // dd($allNoticias);
        return view('noticias.index', ['noticias' => $allNoticias]);
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
        return view('noticias.create');
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
            'titulo' => 'required|string|min:3|max:255',
            'resumen' => 'required|string',
            'contenido' => 'required|string',
            'autor' => 'required|string|max:100',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'categoria' => 'nullable|string|max:100',
            'estado' => 'in:publicado,borrador',
        ],[
            'titulo.required' => 'El titulo es requerido',
            'titulo.string' => 'El titulo debe ser un texto',
            'titulo.min' => 'El titulo debe tener al menos 3 caracteres',
            'titulo.max' => 'El titulo debe tener como maximo 255 caracteres',
            'resumen.required' => 'El resumen es requerido',
            'resumen.string' => 'El resumen debe ser un texto',
            'contenido.required' => 'El contenido es requerido',
            'contenido.string' => 'El contenido debe ser un texto',
            'autor.required' => 'El autor es requerido',
            'autor.string' => 'El autor debe ser un texto',
            'autor.max' => 'El autor debe tener como maximo 100 caracteres',
            'categoria.string' => 'La categoria debe ser un texto',
            'categoria.max' => 'La categoria debe tener como maximo 100 caracteres',
            'estado.in' => 'El estado debe ser publicado o borrador',
        ]);
        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('noticias', 'public');
            $validated['imagen'] = $rutaImagen;
        }
        Noticia::create($validated);

        return redirect()->route('noticias.index')->with('feedback.message', "La noticia <b>" .e( $validated["titulo"] )."</b> fue creada correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('noticias.show', ['noticia' => Noticia::findOrFail($id)]);
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
        return view('noticias.edit', ['noticia' => Noticia::findOrFail($id)]);
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
            'titulo' => 'required|string|min:3|max:255',
            'resumen' => 'required|string',
            'contenido' => 'required|string',
            'autor' => 'required|string|max:100',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categoria' => 'nullable|string|max:100',
            'estado' => 'in:publicado,borrador',
        ],[
            'titulo.required' => 'El titulo es requerido',
            'titulo.string' => 'El titulo debe ser un texto',
            'titulo.min' => 'El titulo debe tener al menos 3 caracteres',
            'titulo.max' => 'El titulo debe tener como maximo 255 caracteres',
            'resumen.required' => 'El resumen es requerido',
            'resumen.string' => 'El resumen debe ser un texto',
            'contenido.required' => 'El contenido es requerido',
            'contenido.string' => 'El contenido debe ser un texto',
            'autor.required' => 'El autor es requerido',
            'autor.string' => 'El autor debe ser un texto',
            'autor.max' => 'El autor debe tener como maximo 100 caracteres',
            'categoria.string' => 'La categoria debe ser un texto',
            'categoria.max' => 'La categoria debe tener como maximo 100 caracteres',
            'estado.in' => 'El estado debe ser publicado o borrador',
        ]);
        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('noticias', 'public');
            $validated['imagen'] = $rutaImagen;
        }
        Noticia::where('id', $id)->update($validated);
        return redirect()->route('noticias.index')->with('feedback.message', "La noticia <b>" .e( $validated["titulo"] )."</b> fue actualizada correctamente");
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
        Noticia::where('id', $id)->delete();
        return redirect()->route('noticias.index')->with('feedback.message', "La noticia <b>" .e( $id )."</b> fue eliminada correctamente");
    }
}
