<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estancia extends Model
{
    use HasFactory;
    protected $table = 'estancias';

    protected $fillable = [
        'placa',
        'hora_entrada',
        'hora_salida',
        'id_vehiculo'
    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'id_vehiculo');
    }
}
