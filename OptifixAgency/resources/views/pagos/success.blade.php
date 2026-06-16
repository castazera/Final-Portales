<x-layout>
    <x-slot:title>Pago Exitoso</x-slot:title>

    <link rel="stylesheet" href="{{ asset('css/servicios.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body text-center p-5">
                        <!-- Icono de éxito animado -->
                        <div class="mb-4">
                            <div style="font-size: 80px; color: #28a745;">
                                <i class="fas fa-check-circle"></i>
                            </div>
                        </div>

                        <h1 class="text-success mb-3">¡Pago Exitoso!</h1>
                        <p class="lead mb-4">Tu compra ha sido procesada correctamente.</p>

                        @if(isset($pago))
                        <div class="alert alert-success text-start">
                            <h5 class="mb-3"><i class="fas fa-receipt"></i> Detalles de la transacción:</h5>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2">
                                    <strong>ID de Pago:</strong>
                                    <code>{{ $pago->payment_id }}</code>
                                </li>
                                <li class="mb-2">
                                    <strong>Servicio:</strong>
                                    {{ $pago->servicio->nombre }}
                                </li>
                                <li class="mb-2">
                                    <strong>Monto:</strong>
                                    <span class="text-success fw-bold">${{ number_format($pago->monto, 2) }} USD</span>
                                </li>
                                <li class="mb-2">
                                    <strong>Estado:</strong>
                                    <span class="badge bg-success">{{ ucfirst($pago->estado) }}</span>
                                </li>
                                <li>
                                    <strong>Fecha:</strong>
                                    {{ $pago->created_at->format('d/m/Y H:i:s') }}
                                </li>
                            </ul>
                        </div>

                        <div class="alert alert-info text-start">
                            <i class="fas fa-info-circle"></i>
                            <strong>¡El servicio ya está disponible en tu cuenta!</strong>
                            <p class="mb-0 mt-2">Puedes acceder a él desde tu perfil de usuario.</p>
                        </div>
                        @endif

                        <div class="mt-4 d-flex gap-2 justify-content-center flex-wrap">
                            <a href="{{ route('services') }}" class="btn btn-primary btn-lg">
                                <i class="fas fa-list"></i> Ver más servicios
                            </a>
                            <a href="{{ route('home') }}" class="btn btn-outline-primary btn-lg">
                                <i class="fas fa-home"></i> Volver al inicio
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        .fa-check-circle {
            animation: scaleIn 0.5s ease-in-out;
        }

        @keyframes scaleIn {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</x-layout>
