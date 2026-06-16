<x-layout>
    <x-slot:title>Pago Rechazado</x-slot:title>

    <link rel="stylesheet" href="{{ asset('css/servicios.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body text-center p-5">
                        <!-- Icono de error -->
                        <div class="mb-4">
                            <div style="font-size: 80px; color: #dc3545;">
                                <i class="fas fa-times-circle"></i>
                            </div>
                        </div>

                        <h1 class="text-danger mb-3">Pago Rechazado</h1>
                        <p class="lead mb-4">Lo sentimos, tu pago no pudo ser procesado.</p>

                        <div class="alert alert-danger text-start">
                            <h5 class="mb-3"><i class="fas fa-exclamation-triangle"></i> Posibles razones:</h5>
                            <ul class="mb-0">
                                <li>Fondos insuficientes en la tarjeta</li>
                                <li>Datos de la tarjeta incorrectos</li>
                                <li>La tarjeta ha expirado</li>
                                <li>El banco rechazó la transacción</li>
                                <li>Límite de compras excedido</li>
                            </ul>
                        </div>

                        <div class="alert alert-info text-start">
                            <i class="fas fa-lightbulb"></i>
                            <strong>Recomendaciones:</strong>
                            <ul class="mb-0 mt-2">
                                <li>Verifica los datos de tu tarjeta</li>
                                <li>Intenta con otro método de pago</li>
                                <li>Contacta a tu banco si el problema persiste</li>
                            </ul>
                        </div>

                        <div class="mt-4 d-flex gap-2 justify-content-center flex-wrap">
                            <a href="{{ route('services') }}" class="btn btn-primary btn-lg">
                                <i class="fas fa-redo"></i> Intentar nuevamente
                            </a>
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg">
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
        .fa-times-circle {
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }
            10%, 30%, 50%, 70%, 90% {
                transform: translateX(-10px);
            }
            20%, 40%, 60%, 80% {
                transform: translateX(10px);
            }
        }
    </style>
</x-layout>
