<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalesController extends Controller
{

    public function list(){
        return Sucursal::all();
    }

    public function store(Request $request){

        return Sucursal::create([
            'nombre' => $request['nombre'],
            'estado' => $request['estado'],
            'ciudad' => $request['ciudad'],
            'cp' => $request['cp']
        ]);
    }

    public function delete(Sucursal $idSucursal){
        $idSucursal->delete();
    }

}
