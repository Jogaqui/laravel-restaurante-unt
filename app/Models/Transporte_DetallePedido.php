<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporte_DetallePedido extends Model
{
    use HasFactory;
    protected $table = 'detallepedido';
    protected $primaryKey = 'idDetalleP';
    public $timestamps = false;
    protected $fillable = [
        'idPedido',
        'idCliente',
        'idRepartidor',
        'fechaPedido',
        'modoPago',
        'totalPagar',
        'estado'
    ];

    // En el modelo Transporte_DetallePedido
    public function pedido()
    {
        return $this->belongsTo(Transporte_Pedido::class, 'idPedido');
    }

    public function clienteDelivery()
    {
        return $this->belongsTo(Transporte_Cliente::class, 'idCliente', 'idCliente');
    }

    public function repartidor()
    {
        return $this->belongsTo(Transporte_Repartidor::class, 'idRepartidor', 'idRepartidor');
    }

    public function mostrarDetallePedido($idDetalleP)
    {
        $detallePedido = Transporte_DetallePedido::with('clienteDelivery', 'repartidor')->find($idDetalleP);

        return view('transporte.detalle.index', ['detallePedido' => $detallePedido]);
    }
    // En el modelo Transporte_DetallePedido
    public function producto()
    {
        return $this->belongsTo(Transporte_Producto::class, 'idProducto', 'idProducto');
    }
}
