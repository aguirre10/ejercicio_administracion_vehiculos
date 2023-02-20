<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $table = 'pagos';

    protected $fillable = [
        'importe',
        'fecha_pago',
    ];

    public function vehiculos()
    {
        return $this->belongsToMany(Vehiculo::class);
    }
}
