<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrevista extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'entrevista';
    protected $primaryKey = 'identrevista';
    public $timestamps=false;
    protected $fillable=['observaciones','fecha','hora','idpersonal','estado'];

    public function postulante()
    {
        return $this->hasOne(Postulante::class,'id','idpersonal');
    }
}
