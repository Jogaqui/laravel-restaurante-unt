<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporte_Administrador extends Model
{
    use HasFactory;
    protected $table = 'administrador';
    protected $primaryKey='dni';
    public $timestamps=false;
    protected $fillable = [
        'cargo'
    ];

    public function usuario()
    {
        return $this->hasOne(Usuario::class,'dni','dni');
    }
}
