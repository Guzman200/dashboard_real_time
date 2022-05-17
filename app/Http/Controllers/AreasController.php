<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreasController extends Controller
{

    public function list(){
        return Area::all();
    }

}
