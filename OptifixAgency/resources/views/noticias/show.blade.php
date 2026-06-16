<x-layout>
    <x-slot:title>{{ $noticia->titulo }}</x-slot:title>

    <link rel="stylesheet" href="{{ asset('css/noticias.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <main class="container py-5">
        <section class="row justify-content-center">
            <article class="col-md-8">
                <div class="card shadow-lg fondo-tarjeta-noticia">
                    <img src="{{ $noticia->imagen ? asset('storage/'.$noticia->imagen) : 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80' }}"
                         class="card-img-top imagen-noticia"
                         alt="noticia">
                    <div class="card-body">
                        <header class="d-flex justify-content-between align-items-center mb-2">
                            <span class="etiqueta-estado">
                                {{ ucfirst($noticia->estado) }}
                            </span>
                            <span class="etiqueta-categoria">
                                {{ $noticia->categoria ?? 'Sin categoría' }}
                            </span>
                        </header>
                        <h2 class="card-title mb-3 titulo-noticia">{{ $noticia->titulo }}</h2>
                        <p class="mb-4 resumen-noticia">{{ $noticia->resumen }}</p>
                        <section class="mb-4 contenido-noticia">
                            {!! nl2br(e($noticia->contenido)) !!}
                        </section>
                        <footer class="d-flex justify-content-between align-items-center mt-4">
                            <small class="autor-noticia">
                                <i class="fas fa-user me-1"></i> {{ $noticia->autor }}
                            </small>
                            <small class="fecha-noticia">
                                <i class="fas fa-calendar-alt me-1"></i> {{ $noticia->created_at->format('d/m/Y H:i') }}
                            </small>
                        </footer>
                        <div class="mt-4">
                            <a href="{{ route('noticias.index') }}" class="btn boton-volver">
                                <i class="fas fa-arrow-left"></i> Volver a noticias
                            </a>
                            @auth
                                @if(auth()->user()->name === 'Admin' && auth()->user()->email === 'admin@gmail.com')
                                    <a href="{{ route('noticias.edit', ['id' => $noticia->id]) }}" class="btn ms-2 boton-editar">
                                        Editar
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </main>
</x-layout>
