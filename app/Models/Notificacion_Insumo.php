<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion_Insumo extends Model
{
    use HasFactory;

    protected $table = 'notificaciones_insumo';
    protected $primaryKey='idNoti';
    public $timestamps=false;
    protected $fillable = [
        'insumo_id',
        'mensaje',
        'fecha_creacion',
        'hora_creacion',
        'estado'
    ];

    public function insumo()
    {
        return $this->hasOne(Almacen_Insumo::class,'idInsumo','insumo_id');
    }
}
