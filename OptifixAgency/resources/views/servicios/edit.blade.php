<x-layout>
    <x-slot:title>Editar servicio</x-slot:title>
    <link rel="stylesheet" href="{{ asset('css/create-edit.css') }}">

    <main>
        <section class="tarjeta-formulario">
            <h2 class="titulo-formulario">Editar servicio {{ $servicio->nombre }}</h2>
            <form action="{{ route('servicios.update', ['id' => $servicio->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf {{--Token de seguridad--}}
                @method('PUT')
                <label for="nombre" class="etiqueta-formulario">Nombre del servicio</label>
                <input type="text" class="campo-formulario @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre', $servicio->nombre) }}" >
                @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="descripcion" class="etiqueta-formulario">Descripción</label>
                <input type="text" class="campo-formulario @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" value="{{ old('descripcion', $servicio->descripcion) }}" >
                @error('descripcion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="detalles" class="etiqueta-formulario">Detalles del servicio</label>
                <textarea class="area-formulario @error('detalles') is-invalid @enderror" id="detalles" name="detalles" rows="3">{{ old('detalles', $servicio->detalles) }}</textarea>
                @error('detalles')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="categoria" class="etiqueta-formulario">Categoría</label>
                <input type="text" class="campo-formulario @error('categoria') is-invalid @enderror" id="categoria" name="categoria" value="{{ old('categoria', $servicio->categoria) }}" >
                @error('categoria')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="precio" class="etiqueta-formulario">Precio (opcional)</label>
                <input type="number" step="0.01" class="campo-formulario @error('precio') is-invalid @enderror" id="precio" name="precio" value="{{ old('precio', $servicio->precio) }}" >
                @error('precio')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="imagen" class="etiqueta-formulario">Imagen</label>
                <input type="file" class="campo-formulario @error('imagen') is-invalid @enderror" id="imagen" name="imagen" value="{{ old('imagen', $servicio->imagen) }}" >
                @error('imagen')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="estado" class="etiqueta-formulario">Estado</label>
                <select class="campo-formulario @error('estado') is-invalid @enderror" id="estado" name="estado">
                    <option value="activo" {{ old('estado', $servicio->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ old('estado', $servicio->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
                @error('estado')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="acciones-formulario">
                    <button type="submit" class="boton-formulario">Actualizar servicio</button>
                    <a href="{{ route('services') }}" class="boton-formulario" style="background:#fff; color:#483AA0; border:1.5px solid #483AA0;">Volver a la lista</a>
                </div>
            </form>
        </section>
    </main>
</x-layout>
