<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoDetalle extends Model
{
    use HasFactory;
    protected $table = 'DETALLE_PEDIDO';
    protected $guarded = [''];
    public $timestamps = false;
}
