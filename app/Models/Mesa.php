<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;
    protected $table = 'mesa';
    protected $primaryKey='idmesa';
    public $timestamps=false;
    protected $fillable = [
        'idpedido'
    ];

    public function pedido()
    {
        return $this->hasOne(Pedido::class,'idpedido','idpedido');
    }

   
}
