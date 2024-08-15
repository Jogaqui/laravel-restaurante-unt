<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraProducto extends Model
{
    use HasFactory;
    protected $table = 'producto';
    protected $guarded = [''];
    public $timestamps = false;
}
