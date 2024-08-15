<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen_Insumo extends Model
{
    use HasFactory;

    protected $table = 'insumo';
    protected $primaryKey='idInsumo';
    public $timestamps=false;
    protected $fillable = [
        'nombreIn',
        'descripcionIn',
        'fechaAdquisicion',
        'fechaCaducidad',
        'lote',
        'stockIn',
        'estado'
    ];

   // public function detalles()
   // {
   //     return $this->hasMany(Detalle::class,'idproducto','idproducto');
   // }
}
