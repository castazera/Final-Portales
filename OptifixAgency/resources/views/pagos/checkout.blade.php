<x-layout>
    <x-slot:title>Checkout - {{ $servicio->nombre }}</x-slot:title>

    <link rel="stylesheet" href="{{ asset('css/servicios.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-9">
                <div class="checkout-container">
                    <div class="checkout-header">
                        <h3 class="checkout-titulo">
                            <i class="fas fa-shopping-cart"></i>
                            Confirmar Compra
                        </h3>
                    </div>

                    <div class="checkout-body">
                        <div class="row align-items-center mb-4">
                            <div class="col-md-4 text-center mb-3 mb-md-0">
                                @if($servicio->imagen)
                                    <img src="{{ asset('storage/'.$servicio->imagen) }}"
                                         class="img-fluid imagen-servicio-checkout"
                                         alt="{{ $servicio->nombre }}">
                                @else
                                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80"
                                         class="img-fluid imagen-servicio-checkout"
                                         alt="{{ $servicio->nombre }}">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="servicio-info">
                                    <h4 class="servicio-nombre">{{ $servicio->nombre }}</h4>
                                    <p class="servicio-descripcion mb-0">{{ $servicio->descripcion }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="precio-destacado">
                            <i class="fas fa-tag"></i> Precio: ${{ number_format($precio ?? $servicio->precio, 2) }} ARS
                        </div>

                        @if(app()->environment('local'))
                        <div class="alert-test">
                            <h5><i class="fas fa-info-circle"></i> Modo TEST - Tarjetas de Prueba</h5>
                            <p class="mb-2"><strong>Importante:</strong> Iniciá sesión con la <strong>cuenta comprador de prueba</strong> y usá una ventana de incógnito.</p>
                            <table class="table table-sm table-bordered mt-2 small">
                                <thead>
                                    <tr><th>Tipo</th><th>Número</th><th>CVV</th><th>Venc.</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td>Visa Crédito</td><td>4509 9535 6623 3704</td><td>123</td><td>11/30</td></tr>
                                    <tr><td>Mastercard Crédito</td><td>5031 7557 3453 0604</td><td>123</td><td>11/30</td></tr>
                                    <tr><td>Visa Débito</td><td>4002 7686 9439 5619</td><td>123</td><td>11/30</td></tr>
                                    <tr><td>Mastercard Débito</td><td>5287 3383 1025 3304</td><td>123</td><td>11/30</td></tr>
                                </tbody>
                            </table>
                            <p class="mb-1 small"><strong>Nombre del titular según resultado deseado:</strong></p>
                            <ul class="small mb-0">
                                <li><strong>APRO</strong> → Pago aprobado | DNI: 12345678</li>
                                <li><strong>OTHE</strong> → Rechazado por error general</li>
                                <li><strong>FUND</strong> → Rechazado por saldo insuficiente</li>
                                <li><strong>CONT</strong> → Pago pendiente</li>
                            </ul>
                        </div>
                        @endif

                        <div class="pago-section text-center">
                            <a href="{{ $checkout_url }}" target="_blank" rel="noopener" class="btn btn-primary btn-lg">
                                <i class="fas fa-credit-card me-2"></i> Pagar con MercadoPago
                            </a>

                            @if(app()->environment('local'))
                            <form action="{{ route('pago.simular', ['id' => $servicio->id]) }}" method="POST" class="mt-3">
                                @csrf
                                <button type="submit" class="btn btn-success btn-lg">
                                    <i class="fas fa-check-circle me-2"></i> Simular pago exitoso (dev)
                                </button>
                                <p class="text-muted small mt-2">Solo visible en entorno local. Aprueba la compra directamente.</p>
                            </form>
                            @endif
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('servicios.show', ['id' => $servicio->id]) }}" class="btn-cancelar">
                                <i class="fas fa-arrow-left"></i> Cancelar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>
