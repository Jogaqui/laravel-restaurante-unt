<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporte_Producto extends Model
{
    use HasFactory;
    protected $table = 'productodelivery';
    protected $primaryKey='idProducto';
    public $timestamps=false;
    protected $fillable = [
        'descripcion',
        'precio',
        'stock'
    ];

    public function pedido()
    {
        return $this->hasMany(Transporte_Pedido::class,'idProducto','idProducto');
    }
}
