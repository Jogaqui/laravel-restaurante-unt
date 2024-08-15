<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';
    protected $primaryKey='dni';
    public $timestamps=false;
    protected $fillable = [
        'dni',
        'password',
        'nombres',
        'fechaNacimiento',
        'sexo',
        'fechaContrato',
        'sueldo',
        'email',
        'telefono'
    ];

    public function mozos()
    {
        return $this->hasMany(Usuario::class,'dni','dni');
    }
    public function administrador()
    {
        return $this->hasMany(Usuario::class,'dni','dni');
    }
}
