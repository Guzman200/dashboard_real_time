<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{

    public function list(){
        return Empleado::all();
    }

}
