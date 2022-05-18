<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{

    public function list(){
        return DB::table('empleados')
            ->join('sucursales', 'empleados.sucursal_id', '=', 'sucursales.id')
            ->join('areas', 'empleados.area_id', '=', 'areas.id')
            ->select('empleados.*', 'sucursales.nombre AS sucursal', 'areas.nombre AS area')
            ->get();
    }

    public function store(Request $request){

        return Empleado::create([
            'nombre' => $request['nombre'],
            'a_paterno' => $request['a_paterno'],
            'a_materno' => $request['a_materno'],
            'sucursal_id' => $request['sucursal_id'],
            'area_id' => $request['area_id']
        ]);
    }

    public function delete(Empleado $idEmployee){
        $idEmployee->delete();
    }

}
