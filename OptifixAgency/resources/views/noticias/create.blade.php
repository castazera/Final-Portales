<x-layout>
    <x-slot:title>Agregar noticia</x-slot:title>
    <link rel="stylesheet" href="{{ asset('css/create-edit.css') }}">

    <main>
        <section class="tarjeta-formulario">
            <h2 class="titulo-formulario">Agregar noticia</h2>
            <form action="{{ route('noticias.store') }}" method="POST" enctype="multipart/form-data">
                @csrf {{--Token de seguridad--}}
                <label for="titulo" class="etiqueta-formulario">Título</label>
                <input type="text" class="campo-formulario @error('titulo') is-invalid @enderror" id="titulo" name="titulo" value="{{ old('titulo') }}" >
                @error('titulo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="resumen" class="etiqueta-formulario">Resumen</label>
                <input type="text" class="campo-formulario @error('resumen') is-invalid @enderror" id="resumen" name="resumen" value="{{ old('resumen') }}" >
                @error('resumen')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="contenido" class="etiqueta-formulario">Contenido</label>
                <textarea class="area-formulario @error('contenido') is-invalid @enderror" id="contenido" name="contenido" rows="3">{{ old('contenido') }}</textarea>
                @error('contenido')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="autor" class="etiqueta-formulario">Autor</label>
                <input type="text" class="campo-formulario @error('autor') is-invalid @enderror" id="autor" name="autor" value="{{ old('autor') }}" >
                @error('autor')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="imagen" class="etiqueta-formulario">Imagen</label>
                <input type="file" class="campo-formulario @error('imagen') is-invalid @enderror" id="imagen" name="imagen" value="{{ old('imagen') }}" >
                @error('imagen')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="categoria" class="etiqueta-formulario">Categoría</label>
                <input type="text" class="campo-formulario @error('categoria') is-invalid @enderror" id="categoria" name="categoria" value="{{ old('categoria') }}" >
                @error('categoria')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="estado" class="etiqueta-formulario">Estado</label>
                <input type="text" class="campo-formulario @error('estado') is-invalid @enderror" id="estado" name="estado" value="{{ old('estado') }}" >
                @error('estado')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="acciones-formulario">
                    <button type="submit" class="boton-formulario">Agregar</button>
                </div>
            </form>
        </section>
    </main>
</x-layout>
