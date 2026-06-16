<?php

namespace App\Services;

use App\Models\Servicio;
use App\Models\User;

class ServicioActivador
{
    public function yaAdquirido(User $user, Servicio $servicio): bool
    {
        return $user->servicios()
            ->where('servicio_id', $servicio->id)
            ->wherePivot('estado', 'activo')
            ->exists();
    }

    public function activar(User $user, int $servicioId): void
    {
        if ($this->yaAdquiridoPorId($user, $servicioId)) {
            return;
        }

        $user->servicios()->detach($servicioId);
        $user->servicios()->attach($servicioId, ['fecha_adquisicion' => now()]);
    }

    private function yaAdquiridoPorId(User $user, int $servicioId): bool
    {
        return $user->servicios()
            ->where('servicio_id', $servicioId)
            ->wherePivot('estado', 'activo')
            ->exists();
    }
}
