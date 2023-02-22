<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estancia extends Model
{
    use HasFactory;
    protected $table = 'estancias';
    protected $primaryKey = 'id_estancia';

    protected $fillable = [
        'placa',
        'estado',
        'hora_entrada',
        'hora_salida',
        'pago',
        'pago_acumulado',
    ];


}
