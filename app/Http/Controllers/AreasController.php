<?php

namespace App\Http\Controllers;

use App\Events\MyEvent;
use App\Models\Area;
use Illuminate\Http\Request;

class AreasController extends Controller
{

    public function list(){
        return Area::all();
    }

    public function store(Request $request){

        $area = Area::create([
            'nombre' => $request['nombre']
        ]);

        event(new MyEvent('hello world'));

        return $area;
    }

    public function delete(Area $idArea){
        $idArea->delete();
        event(new MyEvent('hello world'));
    }

}
