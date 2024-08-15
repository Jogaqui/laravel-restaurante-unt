<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';
    protected $primaryKey='idproducto';
    public $timestamps=false;
    protected $fillable = [
        'descripcion',
        'precio'
    ];

    public function detalles()
    {
        return $this->hasMany(Detalle::class,'idproducto','idproducto');
    }

}
