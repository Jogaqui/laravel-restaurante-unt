<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    use HasFactory;
    protected $table = 'DETALLE_PEDIDO';
    //protected $primaryKey = ['idpedido','idproducto']; 
    public $timestamps=false;
    protected $fillable = [
        'cantidad',
        'precio'
    ];

    public function pedido()
    {
        return $this->hasOne(Pedido::class,'idpedido','idpedido');
    }

    public function producto()
    {
        return $this->hasOne(Producto::class,'idproducto','idproducto');
    }

}
