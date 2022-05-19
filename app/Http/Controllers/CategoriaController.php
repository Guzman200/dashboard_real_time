<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function list(){
        return Categoria::all();
    }

    public function store(Request $request){

        return Categoria::create([
            'nombre' => $request['nombre']
        ]);
    }

    public function delete(Categoria $categoria){
        $categoria->delete();
    }
}
