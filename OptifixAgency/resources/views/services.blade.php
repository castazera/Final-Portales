<x-layout>
    <x-slot:title>Servicios:</x-slot:title>

    <link rel="stylesheet" href="{{ asset('css/services.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <main class="container py-5">
        <header>
            <h1 class="titulo-servicios text-center mb-4">Nuestros Servicios</h1>
            <div class="intro-servicios text-center mb-5">
                <p>
                    En un mundo cada vez más digital, la innovación y la eficiencia son claves para destacar y crecer. Por eso, en <b>Optifix Agency</b> te ofrecemos soluciones tecnológicas de vanguardia, pensadas para transformar la manera en que tu empresa se comunica, analiza y toma decisiones.<br><br>
                    Nuestros servicios están diseñados para impulsar tu negocio, automatizar procesos y ayudarte a aprovechar el verdadero potencial de la inteligencia artificial. Descubre cómo podemos acompañarte en el camino hacia el futuro.
                </p>
            </div>
        </header>
        <section class="acordeon-servicios" id="acordeonServicios">
            @foreach($servicios as $index => $servicio)
                <article class="acordeon-item">
                    <h2 class="acordeon-titulo" id="heading{{ $index + 1 }}">
                        <button class="acordeon-boton {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#servicio{{ $index + 1 }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="servicio{{ $index + 1 }}">
                            {{ $servicio->nombre }}
                        </button>
                    </h2>
                    <div id="servicio{{ $index + 1 }}" class="acordeon-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index + 1 }}" data-bs-parent="#acordeonServicios">
                        <div class="acordeon-cuerpo">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <p class="descripcion-servicio">{{ $servicio->descripcion }}</p>
                                    @if($servicio->precio)
                                        <p class="precio-servicio"><span>Precio:</span> Desde <b>${{ number_format($servicio->precio, 2) }} USD</b></p>
                                    @endif
                                    <p class="categoria-servicio"><span>Categoría:</span> <b>{{ $servicio->categoria }}</b></p>
                                    <p class="estado-servicio"><span>Estado:</span> <b class="{{ $servicio->estado === 'activo' ? 'estado-activo' : 'estado-inactivo' }}">{{ ucfirst($servicio->estado) }}</b></p>
                                    <a href="{{ route('servicios.show', ['id' => $servicio->id]) }}" class="btn boton-solicitar">Solicitar servicio</a>
                                </div>
                                <div class="col-md-4 text-center">
                                    @if($servicio->imagen)
                                        <img class="img-servicio" src="{{ asset('storage/'.$servicio->imagen) }}" alt="Imagen {{ $servicio->nombre }}">
                                    @else
                                        <img class="img-servicio" src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80" alt="Imagen {{ $servicio->nombre }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </section>
        <div class="text-center mt-5">
            <a href="{{ route('services') }}" class="btn boton-accion-servicios">Ver todos los servicios</a>
        </div>
    </main>
</x-layout>
