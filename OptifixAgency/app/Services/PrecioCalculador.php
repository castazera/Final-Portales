<?php

namespace App\Services;

use App\Models\Servicio;

class PrecioCalculador
{
    /**
     * @return array{precio: float, titulo: string}
     */
    public function calcular(Servicio $servicio, ?int $duracionMeses = null): array
    {
        $precio = floatval($servicio->precio);
        $titulo = $servicio->nombre;

        if ($duracionMeses && $servicio->precios) {
            $precioDuracion = $servicio->precios
                ->where('duracion_meses', $duracionMeses)
                ->first();

            if ($precioDuracion) {
                $precio = floatval($precioDuracion->precio);
                $titulo = $servicio->nombre . ' (' . $duracionMeses . ' meses)';
            }
        }

        return compact('precio', 'titulo');
    }
}
