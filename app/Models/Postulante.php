<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    use HasFactory;
    protected $table = 'postulante';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $fillable=['dni','nombre','edad','puntaje','estado'];
}
