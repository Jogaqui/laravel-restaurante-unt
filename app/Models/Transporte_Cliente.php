<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporte_Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientedelivery';
    protected $primaryKey='idCliente';
    public $timestamps=false;
    protected $fillable = [
        'dni',
        'nombre',
        'direccion',
        'correo',
        'telefono'
    ];

    public function pedido()
    {
        return $this->hasMany(Transporte_Pedido::class,'idCliente','idCliente');
    }
}
