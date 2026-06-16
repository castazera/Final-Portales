<x-layout>
    <x-slot:title>Pago Pendiente</x-slot:title>

    <link rel="stylesheet" href="{{ asset('css/servicios.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body text-center p-5">
                        <!-- Icono de pendiente -->
                        <div class="mb-4">
                            <div style="font-size: 80px; color: #ffc107;">
                                <i class="fas fa-clock"></i>
                            </div>
                        </div>

                        <h1 class="text-warning mb-3">Pago Pendiente</h1>
                        <p class="lead mb-4">Tu pago está siendo procesado.</p>

                        <div class="alert alert-warning text-start">
                            <h5 class="mb-3"><i class="fas fa-hourglass-half"></i> ¿Qué significa esto?</h5>
                            <p class="mb-0">
                                Tu pago está en proceso de verificación. Esto puede ocurrir cuando:
                            </p>
                            <ul class="mt-2 mb-0">
                                <li>El pago está esperando confirmación del banco</li>
                                <li>Se realizó un pago en efectivo (Rapipago, Pago Fácil, etc.)</li>
                                <li>El pago requiere validación adicional</li>
                                <li>Se utilizó una transferencia bancaria</li>
                            </ul>
                        </div>

                        <div class="alert alert-info text-start">
                            <i class="fas fa-bell"></i>
                            <strong>Te notificaremos cuando se confirme</strong>
                            <p class="mb-0 mt-2">
                                Una vez que el pago sea confirmado, recibirás una notificación y el servicio
                                estará disponible en tu cuenta. Este proceso puede tomar desde unos minutos
                                hasta 48 horas dependiendo del método de pago utilizado.
                            </p>
                        </div>

                        <div class="card bg-light mt-4">
                            <div class="card-body">
                                <h6 class="mb-2"><i class="fas fa-info-circle"></i> Información importante:</h6>
                                <ul class="text-start mb-0 small">
                                    <li>No es necesario realizar el pago nuevamente</li>
                                    <li>Puedes consultar el estado de tu pago en tu perfil</li>
                                    <li>Si tienes dudas, contáctanos con tu ID de transacción</li>
                                </ul>
                            </div>
                        </div>

                        <div class="mt-4 d-flex gap-2 justify-content-center flex-wrap">
                            <a href="{{ route('services') }}" class="btn btn-primary btn-lg">
                                <i class="fas fa-list"></i> Ver servicios
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
        .fa-clock {
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.1);
                opacity: 0.8;
            }
        }
    </style>
</x-layout>
