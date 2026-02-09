<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
    protected $fillable = [
        'cliente',
        'equipo',
        'problema',
        'tecnico',
        'estado',
        'observaciones'
    ];
}
