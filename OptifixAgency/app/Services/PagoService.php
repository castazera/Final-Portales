<?php

namespace App\Services;

use App\Models\Pago;
use App\Models\Servicio;
use App\Models\User;

class PagoService
{
    public function crearPendiente(User $user, Servicio $servicio, string $preferenceId, float $monto): Pago
    {
        return Pago::create([
            'user_id' => $user->id,
            'servicio_id' => $servicio->id,
            'preference_id' => $preferenceId,
            'monto' => $monto,
            'estado' => 'pendiente',
        ]);
    }

    public function crearSimulado(User $user, Servicio $servicio): Pago
    {
        return Pago::create([
            'user_id' => $user->id,
            'servicio_id' => $servicio->id,
            'preference_id' => 'SIM-' . uniqid(),
            'payment_id' => 'SIM-PAY-' . uniqid(),
            'monto' => $servicio->precio,
            'estado' => 'aprobado',
            'metodo_pago' => 'simulado',
        ]);
    }

    public function actualizarEstado(string $preferenceId, string $estado, ?string $paymentId = null): ?Pago
    {
        $pago = Pago::where('preference_id', $preferenceId)->first();

        if (!$pago) {
            return null;
        }

        $datos = ['estado' => $estado];

        if ($paymentId) {
            $datos['payment_id'] = $paymentId;
        }

        $pago->update($datos);

        return $pago;
    }
}
