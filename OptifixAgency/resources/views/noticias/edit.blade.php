<x-layout>
    <x-slot:title>Editar noticia</x-slot:title>
    <link rel="stylesheet" href="{{ asset('css/create-edit.css') }}">

    <main>
        <section class="tarjeta-formulario">
            <h2 class="titulo-formulario">Editar noticia {{ $noticia->titulo }}</h2>
            <form action="{{ route('noticias.update', ['id' => $noticia->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf {{--Token de seguridad--}}
                @method('PUT')
                <label for="titulo" class="etiqueta-formulario">Título</label>
                <input type="text" class="campo-formulario @error('titulo') is-invalid @enderror" id="titulo" name="titulo" value="{{ old('titulo', $noticia->titulo) }}" >
                @error('titulo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="resumen" class="etiqueta-formulario">Resumen</label>
                <input type="text" class="campo-formulario @error('resumen') is-invalid @enderror" id="resumen" name="resumen" value="{{ old('resumen', $noticia->resumen) }}" >
                @error('resumen')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="contenido" class="etiqueta-formulario">Contenido</label>
                <textarea class="area-formulario @error('contenido') is-invalid @enderror" id="contenido" name="contenido" rows="3">{{ old('contenido', $noticia->contenido) }}</textarea>
                @error('contenido')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="autor" class="etiqueta-formulario">Autor</label>
                <input type="text" class="campo-formulario @error('autor') is-invalid @enderror" id="autor" name="autor" value="{{ old('autor', $noticia->autor) }}" >
                @error('autor')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="imagen" class="etiqueta-formulario">Imagen</label>
                <input type="file" class="campo-formulario @error('imagen') is-invalid @enderror" id="imagen" name="imagen" value="{{ old('imagen', $noticia->imagen) }}" >
                @error('imagen')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="categoria" class="etiqueta-formulario">Categoría</label>
                <input type="text" class="campo-formulario @error('categoria') is-invalid @enderror" id="categoria" name="categoria" value="{{ old('categoria', $noticia->categoria) }}" >
                @error('categoria')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="estado" class="etiqueta-formulario">Estado</label>
                <input type="text" class="campo-formulario @error('estado') is-invalid @enderror" id="estado" name="estado" value="{{ old('estado', $noticia->estado) }}" >
                @error('estado')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="acciones-formulario">
                    <button type="submit" class="boton-formulario">Editar noticia</button>
                    <a href="{{ route('noticias.index') }}" class="boton-formulario" style="background:#fff; color:#483AA0; border:1.5px solid #483AA0;">Volver a la lista</a>
                </div>
            </form>
        </section>
    </main>
</x-layout>
