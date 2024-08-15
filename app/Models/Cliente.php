<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente';
    protected $primaryKey='idcliente';
    public $timestamps=false;
    protected $fillable = [
        'dni',
        'nombres',
        'direccion',
        'email',
        'telefono'
    ];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class,'idcliente','idcliente');
    }
}
