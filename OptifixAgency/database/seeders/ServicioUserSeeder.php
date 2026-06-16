<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Servicio;

class ServicioUserSeeder extends Seeder
{
    /**
     * Asocia al usuario cliente con un servicio de ejemplo.
     */
    public function run(): void
    {
        $cliente = User::where('email', 'martin.gonzalez@gmail.com')->first();
        $servicioWeb = Servicio::where('nombre', 'Desarrollo Web')->first();

        if ($cliente && $servicioWeb) {
            $precio = $servicioWeb->precios()->where('duracion_meses', 6)->first();
            $cliente->servicios()->attach($servicioWeb->id, [
                'fecha_adquisicion' => now()->subDays(45),
                'duracion_meses' => 6,
                'precio_pagado' => $precio ? $precio->precio : $servicioWeb->precio,
                'estado' => 'activo',
            ]);
        }
    }
}
