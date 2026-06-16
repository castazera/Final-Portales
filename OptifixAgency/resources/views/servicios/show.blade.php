<x-layout>
    <x-slot:title>{{ $servicio->nombre }}</x-slot:title>

    <link rel="stylesheet" href="{{ asset('css/servicios.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <main class="container py-5">
        <section class="row justify-content-center">
            <article class="col-md-8">
                <div class="card shadow-lg fondo-tarjeta-servicio">
                    <img src="{{ $servicio->imagen ? asset('storage/'.$servicio->imagen) : 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80' }}"
                         class="card-img-top imagen-servicio"
                         alt="servicio">
                    <div class="card-body">
                        <header class="d-flex justify-content-between align-items-center mb-2">
                            <span class="etiqueta-estado {{ $servicio->estado === 'activo' ? 'estado-activo' : 'estado-inactivo' }}">
                                {{ ucfirst($servicio->estado) }}
                            </span>
                            <span class="etiqueta-categoria">
                                {{ $servicio->categoria ?? 'Sin categoría' }}
                            </span>
                        </header>
                        <h2 class="card-title mb-3 titulo-servicio">{{ $servicio->nombre }}</h2>
                        <p class="mb-4 descripcion-servicio">{{ $servicio->descripcion }}</p>
                        @if($servicio->precios && $servicio->precios->count() > 0)
                            <div class="mb-3">
                                <p class="precio-servicio-label">Precios según duración:</p>
                                <div class="precios-duracion-container">
                                    @foreach($servicio->precios->sortBy('duracion_meses') as $precioDuracion)
                                        <div class="precio-duracion-card">
                                            <span class="precio-duracion-meses">{{ $precioDuracion->duracion_meses }} meses</span>
                                            <span class="precio-duracion-valor">${{ number_format($precioDuracion->precio, 2) }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @elseif($servicio->precio)
                            <div class="mb-3 precio-servicio">
                                <strong>Precio: ${{ number_format($servicio->precio, 2) }}</strong>
                            </div>
                        @endif
                        <section class="mb-4 detalles-servicio">
                            {!! nl2br(e($servicio->detalles)) !!}
                        </section>
                        <footer class="d-flex justify-content-between align-items-center mt-4">
                            <small class="fecha-servicio">
                                <i class="fas fa-calendar-alt me-1"></i> Creado: {{ $servicio->created_at->format('d/m/Y H:i') }}
                            </small>
                            @if($servicio->updated_at != $servicio->created_at)
                                <small class="fecha-actualizacion">
                                    <i class="fas fa-edit me-1"></i> Actualizado: {{ $servicio->updated_at->format('d/m/Y H:i') }}
                                </small>
                            @endif
                        </footer>
                        <div class="mt-4">
                            <a href="{{ route('services') }}" class="btn boton-volver">
                                <i class="fas fa-arrow-left"></i> Volver a servicios
                            </a>
                            @auth
                                @if(auth()->user()->isAdmin())
                                    <a href="{{ route('servicios.edit', ['id' => $servicio->id]) }}" class="btn ms-2 boton-editar">
                                        Editar
                                    </a>
                                @endif
                                @php
                                    $servicioUsuario = auth()->user()->servicios->where('id', $servicio->id)->first();
                                    $yaAdquirido = $servicioUsuario && $servicioUsuario->pivot->estado === 'activo';
                                @endphp
                                @if(!auth()->user()->isAdmin())
                                    @if(!$yaAdquirido)
                                        @if($servicio->precios && $servicio->precios->count() > 0)
                                            <form action="{{ route('pago.crear', ['id' => $servicio->id]) }}" method="GET" class="d-inline ms-2">
                                                <select name="duracion_meses" class="form-select form-select-sm d-inline-block selector-duracion">
                                                    @foreach($servicio->precios->sortBy('duracion_meses') as $precioDuracion)
                                                        <option value="{{ $precioDuracion->duracion_meses }}">
                                                            {{ $precioDuracion->duracion_meses }} meses - ${{ number_format($precioDuracion->precio, 2) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <button type="submit" class="btn btn-success ms-1">
                                                    <i class="fas fa-shopping-cart"></i> Adquirir
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{ route('pago.crear', ['id' => $servicio->id]) }}" class="btn btn-success ms-2">
                                                <i class="fas fa-shopping-cart"></i> Comprar servicio
                                            </a>
                                        @endif
                                    @else
                                        <span class="badge bg-success ms-2">¡Ya adquiriste este servicio!</span>
                                    @endif
                                @endif
                            @else
                                <button class="btn btn-success ms-2" disabled>Comprar servicio (Inicia sesión)</button>
                            @endauth
                        </div>
                        @if(session('feedback.message'))
                            <div class="alert alert-success mt-3">{!! session('feedback.message') !!}</div>
                        @endif
                        @if(session('feedback.error'))
                            <div class="alert alert-danger mt-3">{!! session('feedback.error') !!}</div>
                        @endif
                    </div>
                </div>
            </article>
        </section>
    </main>
</x-layout>
