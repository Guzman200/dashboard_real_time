<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VentaController extends Controller
{
    public function crearVenta(Request $request)
    {

        $venta = Venta::create([
            'sucursal_id'   => $request->sucursal_id,
            'empleado_id'   => $request->empleado_id, 
            'cliente_id'    => $request->cliente_id,
            'forma_pago_id' => $request->forma_pago_id,
            'total'         => $request->total
        ]);

        $productos = $request->detalles;

        Log::debug("productos", ['productos' => $productos]);

        foreach($productos as $producto){
            DetalleVenta::create([
                'venta_id'      => $venta->id,
                'producto_id'   => $producto['producto_id'],
                'precio_venta'  => $producto['precio_venta'],
                'precio_compra' => $producto['precio_compra'],
                'cantidad'      => $producto['cantidad']
            ]);
        }


        return response()->json([],200);

    }
}
