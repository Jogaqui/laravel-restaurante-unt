<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'pedido';
    protected $primaryKey='idpedido';
    public $timestamps=false;
    protected $fillable = [
        'observaciones',
        'situacion',
        'medioPago',
        'modalidad'
    ];

    public function cliente()
    {
        return $this->hasOne(Cliente::class,'idcliente','idcliente');
    }

    public function mesas()
    {
        return $this->hasMany(Mesa::class,'idpedido','idpedido');
    }

    public function detalles()
    {
        return $this->hasMany(Detalle::class,'idpedido','idpedido');
    }
   
    
}
