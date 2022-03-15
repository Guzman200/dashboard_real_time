<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoSucursal extends Model
{
    use HasFactory;

    protected $table = "productos_sucursal";
    protected $guarded = [];
}
