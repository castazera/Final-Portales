<x-layout>
    <x-slot:title>Agregar servicio</x-slot:title>
    <link rel="stylesheet" href="{{ asset('css/create-edit.css') }}">

    <main>
        <section class="tarjeta-formulario">
            <h2 class="titulo-formulario">Agregar servicio</h2>
            <form action="{{ route('servicios.store') }}" method="POST" enctype="multipart/form-data">
                @csrf {{--Token de seguridad--}}
                <label for="nombre" class="etiqueta-formulario">Nombre del servicio</label>
                <input type="text" class="campo-formulario @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" >
                @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="descripcion" class="etiqueta-formulario">Descripción</label>
                <input type="text" class="campo-formulario @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" value="{{ old('descripcion') }}" >
                @error('descripcion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="detalles" class="etiqueta-formulario">Detalles del servicio</label>
                <textarea class="area-formulario @error('detalles') is-invalid @enderror" id="detalles" name="detalles" rows="3">{{ old('detalles') }}</textarea>
                @error('detalles')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="categoria" class="etiqueta-formulario">Categoría</label>
                <input type="text" class="campo-formulario @error('categoria') is-invalid @enderror" id="categoria" name="categoria" value="{{ old('categoria') }}" >
                @error('categoria')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="precio" class="etiqueta-formulario">Precio (opcional)</label>
                <input type="number" step="0.01" class="campo-formulario @error('precio') is-invalid @enderror" id="precio" name="precio" value="{{ old('precio') }}" >
                @error('precio')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="imagen" class="etiqueta-formulario">Imagen</label>
                <input type="file" class="campo-formulario @error('imagen') is-invalid @enderror" id="imagen" name="imagen" value="{{ old('imagen') }}" >
                @error('imagen')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="estado" class="etiqueta-formulario">Estado</label>
                <select class="campo-formulario @error('estado') is-invalid @enderror" id="estado" name="estado">
                    <option value="activo" {{ old('estado') == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ old('estado') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
                @error('estado')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="acciones-formulario">
                    <button type="submit" class="boton-formulario">Agregar servicio</button>
                </div>
            </form>
        </section>
    </main>
</x-layout>
