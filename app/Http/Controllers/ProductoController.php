<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function list(){
        return DB::table('productos')
            ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
            ->join('areas', 'productos.area_id', '=', 'areas.id')
            ->select('productos.*', 'categorias.nombre AS categoria', 'areas.nombre AS area')
            ->get();
    }

    public function store(Request $request){

        return Producto::create([
            'nombre' => $request['nombre'],
            'marca' => $request['marca'],
            'precio_venta' => $request['precio_venta'],
            'categoria_id' => $request['categoria_id'],
            'area_id' => $request['area_id']
        ]);
    }

    public function delete(Producto $producto){
        $producto->delete();
    }
}
