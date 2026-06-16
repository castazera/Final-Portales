<x-layout>
    <x-slot:title>Noticias:</x-slot:title>

    <link rel="stylesheet" href="{{ asset('css/noticiasPrincipales.css') }}">

    <main>
        <h1 class="titulo-noticias-principales">Noticias Principales</h1>

        {{-- TODO ESTO DEBE APARECER SOLO SI EL USUARIO ESTA LOGUEADO --}}
        @auth
        @if(auth()->user()->name === 'Admin' && auth()->user()->email === 'admin@gmail.com')
        <div class="contenedor-agregar-noticia">
            <p class="mb-3">
                <a href="{{route('noticias.create')}}" class="boton-leer-mas">Agregar noticia</a>
            </p>
        </div>
        @endif
        @endauth

        <section class="contenedor-tarjetas">
            @foreach($noticias as $noticia)
                <article class="tarjeta-noticia position-relative">
                    <img src="{{ $noticia->imagen ? asset('storage/'.$noticia->imagen) : 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80' }}" class="imagen-noticia" alt="noticia">
                    <span class="categoria-tarjeta">{{ $noticia->categoria ?? 'Sin categoría' }}</span>
                    <div class="tarjeta-cuerpo">
                        <div class="titulo-tarjeta">{{ $noticia->titulo }}</div>
                        <div class="resumen-tarjeta">{{ $noticia->resumen }}</div>
                        <div class="autor-tarjeta">{{ $noticia->autor }}</div>
                        <a href="{{ route('noticias.show', ['id' => $noticia->id]) }}" class="boton-leer-mas">Leer más</a>
                        @auth
                        @if(auth()->user()->name === 'Admin' && auth()->user()->email === 'admin@gmail.com')
                            <div style="margin-top:1rem; display:flex; gap:0.5rem;">
                                <a href="{{ route('noticias.edit', ['id' => $noticia->id]) }}" class="boton-leer-mas" style="background:#E3D095; color:#0E2148; border:1px solid #483AA0;">Editar</a>
                                <button type="button" class="boton-leer-mas" style="background:#fff; color:#483AA0; border:1px solid #483AA0;" onclick="document.getElementById('modalEliminar{{ $noticia->id }}').style.display='block';">Eliminar</button>
                            </div>
                        @endif
                        @endauth
                    </div>
                </article>
                <div class="modal-overlay" id="modalEliminar{{ $noticia->id }}" style="display: none;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirmar eliminación</h5>
                            <button type="button" class="modal-button modal-button-cancel" onclick="document.getElementById('modalEliminar{{ $noticia->id }}').style.display='none';">Cerrar</button>
                        </div>
                        <div class="modal-body">
                            ¿Estas seguro de que quieres eliminar esta noticia?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="modal-button modal-button-cancel" onclick="document.getElementById('modalEliminar{{ $noticia->id }}').style.display='none';">Cancelar</button>
                            <form action="{{ route('noticias.destroy', ['id' => $noticia->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="modal-button modal-button-delete">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    </main>
</x-layout>
