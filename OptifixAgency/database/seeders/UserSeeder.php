<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Crea el usuario Admin y un usuario cliente de prueba.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'martin.gonzalez@gmail.com'],
            [
                'name' => 'Martín González',
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'telefono' => '+54 11 5678-1234',
                'direccion' => 'Av. Corrientes 1234, CABA',
            ]
        );
    }
}
