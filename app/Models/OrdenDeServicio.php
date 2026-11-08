<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenDeServicio extends Model
{
       protected $table = 'orden_de_servicio';

    protected $fillable = [
        'cliente_id',
        'usuario_id',
        'codigo_orden',
        'descripcion',
        'tipo_servicio',
        'prioridad',
        'estado',
        'fecha_cierre_estimada'
    ];
}
