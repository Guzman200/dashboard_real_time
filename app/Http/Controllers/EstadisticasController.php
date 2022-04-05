<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Venta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadisticasController extends Controller
{
    /**
     * 
     * @return {
     *            "ganancias"       : value,
     *            "clientes_nuevos" : value,
     *            "numero_ventas"   : value,
     *            "numero_clientes" : value
     *         }
     */
    public function estadisticasGenerales(Request $request)
    {

        $fecha = Carbon::now()->subDays(30);
        
        $ganancias = DB::select('select sum(( (precio_venta * cantidad) - (precio_compra * cantidad)  )) as ganancia
                    from detalle_venta')[0];

        $numero_ventas = Venta::count();
        
        $numero_clientes = Cliente::count();

        $clientes_nuevos = Cliente::where('created_at', '>=', $fecha)->count(); // los registrados en los ultimos 30 dias
        
        
        return response()->json([
            'ganancias' => number_format($ganancias->ganancia,2),
            'clientes_nuevos' => $clientes_nuevos,
            'numero_ventas' => $numero_ventas,
            'numero_clientes' => $numero_clientes
        ]);
    }
}
