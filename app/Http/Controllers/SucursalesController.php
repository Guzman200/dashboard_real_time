<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalesController extends Controller
{

    public function list(){
        return Sucursal::all();
    }

}
