<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicios';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'descripcion', 'detalles', 'categoria', 'precio', 'imagen', 'estado']; //permite que se pueda crear un nuevo registro

    /**
     * Relación muchos a muchos con User.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'servicio_user', 'servicio_id', 'user_id')
                    ->withPivot('fecha_adquisicion', 'duracion_meses', 'precio_pagado', 'estado')
                    ->withTimestamps();
    }

    /**
     * Precios según duración del servicio.
     */
    public function precios()
    {
        return $this->hasMany(ServicioPrecio::class);
    }
}
