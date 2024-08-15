<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporte_Pedido extends Model
{
    use HasFactory;
    protected $table = 'pedidodelivery';
    protected $primaryKey = 'idPedido';
    public $timestamps = false;
    protected $fillable = [
        'idCliente',
        'idProducto',
        'cantidad',
        'estado'
    ];

    // En el modelo Transporte_Pedido
    public function cliente()
    {
        return $this->belongsTo(Transporte_Cliente::class, 'idCliente');
    }

    public function producto()
    {
        return $this->hasOne(Transporte_Producto::class, 'idProducto', 'idProducto');
    }
    // En el modelo Transporte_Pedido
    public function detallesPedido()
    {
        return $this->hasMany(Transporte_DetallePedido::class, 'idPedido');
    }
    public function productos()
    {
        return $this->hasMany(Transporte_DetallePedido::class, 'idPedido', 'idPedido');
        return $this->belongsToMany(Transporte_Producto::class, 'detalle_pedido', 'idPedido', 'idProducto')
            ->withPivot('cantidad');
    }
}
