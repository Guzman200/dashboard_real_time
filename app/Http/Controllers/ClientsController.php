<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientsController extends Controller
{

    public function list(){
        return Cliente::all();
    }

    public function store(Request $request){

        return Cliente::create([
            'nombre' => $request['nombre'],
            'a_paterno' => $request['a_paterno'],
            'a_materno' => $request['a_materno'],
            'telefono' => $request['telefono']
        ]);
    }

    public function delete(Cliente $idClient){
        $idClient->delete();
    }

}
