<x-layout>
    <x-slot:title>Eliminar servicio</x-slot:title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <main>
        <section>
            <header>
                <h1>Eliminar servicio {{ $servicio->nombre }}</h1>
            </header>
            <dl>
                <dt>Nombre</dt>
                <dd>{{ $servicio->nombre }}</dd>
                <dt>Descripción</dt>
                <dd>{{ $servicio->descripcion }}</dd>
                <dt>Detalles</dt>
                <dd>{{ $servicio->detalles }}</dd>
                <dt>Categoría</dt>
                <dd>{{ $servicio->categoria }}</dd>
                <dt>Precio</dt>
                <dd>{{ $servicio->precio ? '$' . number_format($servicio->precio, 2) : 'No especificado' }}</dd>
                <dt>Imagen</dt>
                <dd>{{ $servicio->imagen }}</dd>
                <dt>Estado</dt>
                <dd>{{ ucfirst($servicio->estado) }}</dd>
            </dl>
            <p><a href="{{ route('services') }}">Volver a servicios</a></p>
            <form action="{{ route('servicios.destroy', ['id' => $servicio->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <div>
                    <p>¿Estás seguro de querer eliminar el servicio <b>{{ $servicio->nombre }}</b>?</p>
                </div>
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </section>
    </main>

</x-layout>
