<?php

namespace App\Http\Controllers;

use App\Events\MyEvent;
use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalesController extends Controller
{

    public function list(){
        return Sucursal::all();
    }

    public function store(Request $request){

        $sucursal = Sucursal::create([
            'nombre' => $request['nombre'],
            'estado' => $request['estado'],
            'ciudad' => $request['ciudad'],
            'cp' => $request['cp']
        ]);

        event(new MyEvent('hello world'));

        return $sucursal;
    }

    public function delete(Sucursal $idSucursal){
        $idSucursal->delete();
        event(new MyEvent('hello world'));
    }

}
