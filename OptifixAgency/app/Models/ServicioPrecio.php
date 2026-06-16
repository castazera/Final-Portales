<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicioPrecio extends Model
{
    protected $table = 'servicio_precios';

    protected $fillable = ['servicio_id', 'duracion_meses', 'precio'];

    /**
     * Relación con el servicio al que pertenece este precio.
     */
    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }
}
