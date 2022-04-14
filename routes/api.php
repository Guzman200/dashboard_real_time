<?php

use App\Http\Controllers\EstadisticasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('estadisticasGenerales', [EstadisticasController::class, 'estadisticasGenerales']);

Route::get('estadisticasGenerales2', [EstadisticasController::class, 'estadisticasGenerales2']);

Route::get('ultimasVentas', [EstadisticasController::class, 'ultimasVentas']);

Route::get('ultimosProductosVendidos', [EstadisticasController::class, 'ultimosProductosVendidos']);

Route::get('clientesConMasCompras', [EstadisticasController::class, 'clientesConMasCompras']);

Route::get('productosMasVendidos', [EstadisticasController::class, 'productosMasVendidos']);

Route::get('productosMenosVendidos', [EstadisticasController::class, 'productosMenosVendidos']);