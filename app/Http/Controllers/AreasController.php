<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreasController extends Controller
{

    public function list(){
        return Area::all();
    }

    public function store(Request $request){

        return Area::create([
            'nombre' => $request['nombre']
        ]);
    }

    public function delete(Area $idArea){
        $idArea->delete();
    }

}
