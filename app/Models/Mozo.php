<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mozo extends Model
{
    use HasFactory;

    protected $table = 'mozo';
    protected $primaryKey='dni';
    public $timestamps=false;
    protected $fillable = [
        'tipoContrato'
    ];

    public function usuario()
    {
        return $this->hasOne(Usuario::class,'dni','dni');
    }
}
