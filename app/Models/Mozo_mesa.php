<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mozo_mesa extends Model
{
    use HasFactory;

    protected $table = 'mozo_mesa';
    //protected $primaryKey='dni';
    public $timestamps=false;
    protected $fillable = [
        'fechaAsignacion'
    ];

    
}
