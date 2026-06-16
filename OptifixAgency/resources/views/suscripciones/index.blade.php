<x-layout>
    <x-slot:title>Mis Servicios</x-slot:title>
    <link rel="stylesheet" href="{{ asset('css/suscripciones.css') }}">

    <div class="suscripciones-container">
        <h1 class="suscripciones-titulo">Mis Servicios</h1>

        @if(session('feedback.error'))
            <div class="alerta-login-error">
                {!! session('feedback.error') !!}
            </div>
        @endif

        @if($servicios->isEmpty())
            <div class="suscripciones-vacio">
                <p>Todavía no adquiriste ningún servicio.</p>
                <a href="{{ route('services') }}" class="boton-suscripcion">Ver servicios disponibles</a>
            </div>
        @else
            <div class="suscripciones-lista">
                @foreach($servicios as $servicio)
                    <div class="suscripcion-card {{ $servicio->pivot->estado === 'cancelado' ? 'suscripcion-cancelada' : '' }}">
                        <div class="suscripcion-header">
                            <h3 class="suscripcion-nombre">{{ $servicio->nombre }}</h3>
                            <span class="suscripcion-estado {{ $servicio->pivot->estado === 'activo' ? 'estado-activo' : 'estado-cancelado' }}">
                                {{ ucfirst($servicio->pivot->estado) }}
                            </span>
                        </div>
                        <div class="suscripcion-info">
                            <div class="suscripcion-dato">
                                <span class="suscripcion-label">Categoría</span>
                                <span class="suscripcion-valor">{{ $servicio->categoria }}</span>
                            </div>
                            <div class="suscripcion-dato">
                                <span class="suscripcion-label">Duración</span>
                                <span class="suscripcion-valor">{{ $servicio->pivot->duracion_meses ? $servicio->pivot->duracion_meses . ' meses' : 'No especificada' }}</span>
                            </div>
                            <div class="suscripcion-dato">
                                <span class="suscripcion-label">Precio pagado</span>
                                <span class="suscripcion-valor">${{ $servicio->pivot->precio_pagado ? number_format($servicio->pivot->precio_pagado, 2) : number_format($servicio->precio, 2) }}</span>
                            </div>
                            <div class="suscripcion-dato">
                                <span class="suscripcion-label">Adquirido el</span>
                                <span class="suscripcion-valor">{{ \Carbon\Carbon::parse($servicio->pivot->fecha_adquisicion)->format('d/m/Y') }}</span>
                            </div>
                        </div>
                        <div class="suscripcion-acciones">
                            <a href="{{ route('servicios.show', $servicio->id) }}" class="boton-suscripcion-ver">Ver detalle</a>
                            @if($servicio->pivot->estado === 'activo')
                                <button type="button" class="boton-suscripcion-cancelar" onclick="abrirModalCancelar({{ $servicio->id }}, '{{ e($servicio->nombre) }}')">Cancelar servicio</button>
                                <form id="form-cancelar-{{ $servicio->id }}" action="{{ route('suscripciones.cancel', $servicio->id) }}" method="POST" style="display:none;">
                                    @csrf
                                    @method('PUT')
                                </form>
                            @else
                                <span class="suscripcion-cancelada-texto">Servicio cancelado</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- Modal de confirmación para cancelar servicio --}}
    <div id="modal-cancelar" class="modal-cancelar-overlay" style="display:none;">
        <div class="modal-cancelar-contenido">
            <div class="modal-cancelar-icono">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#E3D095" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
            </div>
            <h3 class="modal-cancelar-titulo">Cancelar servicio</h3>
            <p class="modal-cancelar-mensaje">¿Estás seguro de que querés cancelar el servicio <strong id="modal-nombre-servicio"></strong>?</p>
            <p class="modal-cancelar-aviso">Esta acción cambiará el estado del servicio a cancelado.</p>
            <div class="modal-cancelar-botones">
                <button type="button" class="modal-btn-volver" onclick="cerrarModalCancelar()">Volver</button>
                <button type="button" class="modal-btn-confirmar" id="modal-btn-confirmar">Sí, cancelar</button>
            </div>
        </div>
    </div>

    <script>
        var servicioIdActual = null;

        function abrirModalCancelar(id, nombre) {
            servicioIdActual = id;
            document.getElementById('modal-nombre-servicio').textContent = nombre;
            document.getElementById('modal-cancelar').style.display = 'flex';
        }

        function cerrarModalCancelar() {
            document.getElementById('modal-cancelar').style.display = 'none';
            servicioIdActual = null;
        }

        document.getElementById('modal-btn-confirmar').addEventListener('click', function() {
            if (servicioIdActual) {
                document.getElementById('form-cancelar-' + servicioIdActual).submit();
            }
        });

        // Cerrar modal al hacer click fuera del contenido
        document.getElementById('modal-cancelar').addEventListener('click', function(e) {
            if (e.target === this) {
                cerrarModalCancelar();
            }
        });
    </script>
</x-layout>
