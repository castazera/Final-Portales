<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servicio;
use App\Models\ServicioPrecio;

class ServicioPreciosSeeder extends Seeder
{
    /**
     * Crea los precios por duración para cada servicio.
     */
    public function run(): void
    {
        $servicios = Servicio::all();

        // Precios por duración: a menor plazo, mayor precio
        $multiplicadores = [
            3 => 1.4,
            6 => 1.0,
            12 => 0.75,
        ];

        foreach ($servicios as $servicio) {
            foreach ($multiplicadores as $meses => $multiplicador) {
                ServicioPrecio::create([
                    'servicio_id' => $servicio->id,
                    'duracion_meses' => $meses,
                    'precio' => round($servicio->precio * $multiplicador, 2),
                ]);
            }
        }
    }
}
