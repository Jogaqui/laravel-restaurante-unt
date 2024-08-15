<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporte_Repartidor extends Model
{
    use HasFactory;

    protected $table = 'repartidor';
    protected $primaryKey='idRepartidor';
    public $timestamps=false;
    protected $fillable = [
        'dni',
        'nombres',
        'direccion',
        'email',
        'telefono',
        'sueldo',
        'vehiculo',
        'placa'
    ];

    public function pedido()
    {
        return $this->hasMany(Transporte_Pedido::class,'idRepartidor','idRepartidor');
    }
}
