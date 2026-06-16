<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Servicio;

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicios = [
            [
                'nombre' => 'Desarrollo Web',
                'descripcion' => 'Creamos sitios web modernos y responsivos',
                'detalles' => 'Ofrecemos desarrollo web completo incluyendo diseño, programación, testing y despliegue. Utilizamos las últimas tecnologías como React, Laravel, y Node.js para crear experiencias web excepcionales.',
                'categoria' => 'Desarrollo',
                'precio' => 2500.00,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Aplicaciones Móviles',
                'descripcion' => 'Desarrollo de apps nativas y multiplataforma',
                'detalles' => 'Especialistas en desarrollo de aplicaciones móviles para iOS y Android. Creamos apps nativas con Swift/Kotlin o multiplataforma con React Native y Flutter.',
                'categoria' => 'Desarrollo',
                'precio' => 3500.00,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Consultoría IT',
                'descripcion' => 'Asesoramiento especializado en tecnología',
                'detalles' => 'Brindamos consultoría estratégica en tecnología de la información. Evaluamos tu infraestructura actual y proponemos mejoras para optimizar procesos y reducir costos.',
                'categoria' => 'Consultoría',
                'precio' => 150.00,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Mantenimiento de Sistemas',
                'descripcion' => 'Soporte técnico y mantenimiento continuo',
                'detalles' => 'Servicio de mantenimiento preventivo y correctivo para sistemas informáticos. Monitoreo 24/7, actualizaciones de seguridad y respaldos automáticos.',
                'categoria' => 'Soporte',
                'precio' => 800.00,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Diseño UX/UI',
                'descripcion' => 'Diseño centrado en la experiencia del usuario',
                'detalles' => 'Creamos interfaces intuitivas y atractivas que mejoran la experiencia del usuario. Incluye investigación de usuarios, wireframes, prototipos y diseño visual.',
                'categoria' => 'Diseño',
                'precio' => 1200.00,
                'estado' => 'activo',
            ],
        ];

        foreach ($servicios as $servicio) {
            Servicio::create($servicio);
        }
    }
}
