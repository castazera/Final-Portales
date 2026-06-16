<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Services\MercadoPagoPreferenciaService;
use App\Services\PagoService;
use App\Services\PrecioCalculador;
use App\Services\ServicioActivador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PagoController extends Controller
{
    public function __construct(
        private PrecioCalculador $precioCalculador,
        private MercadoPagoPreferenciaService $preferenciaService,
        private PagoService $pagoService,
        private ServicioActivador $servicioActivador,
    ) {}

    public function crearPreferencia(Request $request, $id)
    {
        $servicio = Servicio::findOrFail($id);
        $user = Auth::user();

        if ($this->servicioActivador->yaAdquirido($user, $servicio)) {
            return redirect()->back()->with('feedback.error', '¡Ya has adquirido este servicio!');
        }

        $duracion = $request->query('duracion_meses');
        $calculo = $this->precioCalculador->calcular($servicio, $duracion ? (int) $duracion : null);

        try {
            $preferencia = $this->preferenciaService->crear(
                $user, $servicio, $calculo['precio'], $calculo['titulo']
            );

            $this->pagoService->crearPendiente(
                $user, $servicio, $preferencia['preference_id'], $calculo['precio']
            );

            return view('pagos.checkout', [
                'servicio' => $servicio,
                'checkout_url' => $preferencia['checkout_url'],
                'precio' => $calculo['precio'],
                'titulo' => $calculo['titulo'],
            ]);
        } catch (\Exception $e) {
            Log::error('Error al crear preferencia MercadoPago: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->back()->with('feedback.error', 'Error al crear la preferencia: ' . $e->getMessage());
        }
    }

    public function success(Request $request)
    {
        $paymentId = $request->query('payment_id');
        $preferenceId = $request->query('preference_id');

        if ($paymentId && $preferenceId) {
            $pago = $this->pagoService->actualizarEstado($preferenceId, 'aprobado', $paymentId);

            if ($pago) {
                $this->servicioActivador->activar($pago->user, $pago->servicio_id);
                return view('pagos.success', ['pago' => $pago]);
            }
        }

        return redirect()->route('services')->with('feedback.message', '¡Pago procesado exitosamente!');
    }

    public function failure(Request $request)
    {
        $preferenceId = $request->query('preference_id');

        if ($preferenceId) {
            $this->pagoService->actualizarEstado($preferenceId, 'rechazado');
        }

        return view('pagos.failure');
    }

    public function pending(Request $request)
    {
        $preferenceId = $request->query('preference_id');

        if ($preferenceId) {
            $this->pagoService->actualizarEstado($preferenceId, 'pendiente');
        }

        return view('pagos.pending');
    }

    public function simularPago($id)
    {
        abort_unless(app()->environment('local'), 403);

        $servicio = Servicio::findOrFail($id);
        $user = Auth::user();

        if ($this->servicioActivador->yaAdquirido($user, $servicio)) {
            return redirect()->back()->with('feedback.error', '¡Ya has adquirido este servicio!');
        }

        $pago = $this->pagoService->crearSimulado($user, $servicio);
        $this->servicioActivador->activar($user, $servicio->id);

        return view('pagos.success', ['pago' => $pago]);
    }

    public function webhook(Request $request)
    {
        $data = $request->all();
        Log::info('MercadoPago Webhook:', $data);

        if (isset($data['type']) && $data['type'] === 'payment') {
            $paymentId = $data['data']['id'];
        }

        return response()->json(['status' => 'ok'], 200);
    }
}
