<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\DetalleVenta;
use App\Models\ProductoSucursal;
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

    /**
     * 
     * @return {
     *            "costo_inventario"     : value,
     *            "productos_inventario" : value,
     *            "ventas_neto"          : value,
     *            "ventas_bruto"         :  value
     *         }
     */
    public function estadisticasGenerales2()
    {
        $costo_inventario = DB::select('select sum( precio_compra * stock ) as costo_inventario
        from productos_sucursal')[0];

        $productos_inventario = DB::select('select sum(stock) as productos_inventario
        from productos_sucursal')[0];

        $ventas_neto = DB::select('select sum( precio_compra * cantidad ) as ventas_neto
                    from detalle_venta')[0];

        $ventas_bruto = DB::select('select sum( precio_venta * cantidad ) as ventas_bruto
                    from detalle_venta')[0];

        return response()->json([
            'costo_inventario'     => $costo_inventario->costo_inventario,
            'productos_inventario' => $productos_inventario->productos_inventario,
            'ventas_neto'          => $ventas_neto->ventas_neto,
            'ventas_bruto'         => $ventas_bruto->ventas_bruto
        ]);
    }

    public function ultimasVentas()
    {
        $ventas = Venta::with(['cliente', 'formaPago'])->orderBy('created_at', 'DESC')->take(7)->get();

        return response()->json($ventas);
    }

    public function ultimosProductosVendidos()
    {

        $detalle = DetalleVenta::select(['producto_id'])->with(['producto'])->distinct()->orderBy('created_at', 'DESC')->take(4)->get();

        return response()->json($detalle);
    }

    public function clientesConMasCompras()
    {

        $detalle = Venta::select([
            
            'cliente_id',
            DB::raw('COUNT(*) as total_ventas')
        ])
        ->with(['cliente'])
        ->groupBy('cliente_id')
        ->orderBy('total_ventas', 'DESC')
        ->take(8)
        ->get();

        return response()->json($detalle);
    }

    public function productosMasVendidos()
    {
        $productos = DetalleVenta::select([
            'producto_id',
            DB::raw('SUM(cantidad) as total_ventas')
        ])
        ->with(['producto'])
        ->groupBy('producto_id')
        ->orderBy('total_ventas', 'DESC')
        ->take(6)
        ->get();

        return response()->json($productos);
    }

    public function productosMenosVendidos()
    {
        $productos = DetalleVenta::select([
            'producto_id',
            DB::raw('SUM(cantidad) as total_ventas')
        ])
        ->with(['producto'])
        ->groupBy('producto_id')
        ->orderBy('total_ventas', 'ASC')
        ->take(6)
        ->get();

        return response()->json($productos);
    }

}
