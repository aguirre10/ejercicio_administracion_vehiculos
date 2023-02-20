<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;
    protected $table = 'vehiculos';
    protected $fillable = [
        'placa', 'estado', 'id_tipo_vehiculo'
    ];

    public function tipoVehiculo()
    {
        return $this->belongsTo('App\TipoVehiculo', 'id_tipo_vehiculo');
    }

    public function estancias()
    {
        return $this->belongsToMany('App\Estancia')->withTimestamps();
    }

    public function pagos()
    {
        return $this->belongsToMany('App\Pago')->withTimestamps();
    }
}
