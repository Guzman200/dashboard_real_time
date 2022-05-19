<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\AreasController;
use App\Http\Controllers\SucursalesController;
use App\Http\Controllers\ClientsController;

use App\Events\MyEvent;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clientes', function () {
    return view('clientes');
});

Route::get('/empleados', function () {
    return view('empleados');
});

Route::get('/sucursales', function () {
    return view('sucursales');
});

Route::get('/areas', function () {
    return view('areas');
});

Route::get('/categorias', function () {
    return view('categorias');
});

//Rutas de empleados
Route::get('/employees_list',[EmployeesController::class, 'list'])->name('employees_list');
Route::post('/create_employee',[EmployeesController::class, 'store'])->name('create_employee');
Route::delete('/delete_employee/{idEmployee}',[EmployeesController::class, 'delete'])->name('delete_employee');

//Rutas de clientes
Route::get('/clients_list',[ClientsController::class, 'list'])->name('clients_list');
Route::post('/create_client',[ClientsController::class, 'store'])->name('create_client');
Route::delete('/delete_client/{idClient}',[ClientsController::class, 'delete'])->name('delete_client');

//Rutas de sucursales
Route::get('/sucursal_list',[SucursalesController::class, 'list'])->name('sucursal_list');
Route::post('/create_sucursal',[SucursalesController::class, 'store'])->name('create_sucursal');
Route::delete('/delete_sucursal/{idSucursal}',[SucursalesController::class, 'delete'])->name('delete_sucursal');

//Rutas de areas
Route::get('/area_list',[AreasController::class, 'list'])->name('area_list');
Route::post('/create_area',[AreasController::class, 'store'])->name('create_area');
Route::delete('/delete_area/{idArea}',[AreasController::class, 'delete'])->name('delete_area');

//Rutas de categorias
Route::get('/categoria_list',[CategoriaController::class, 'list'])->name('categoria_list');
Route::post('/create_categoria',[CategoriaController::class, 'store'])->name('categoria_area');
Route::delete('/delete_categoria/{categoria}',[CategoriaController::class, 'delete'])->name('categoria_area');


Route::get('test', function(){

    event(new MyEvent('hello world'));
    //Pusher::trigger('my-channel', 'my-event', 'Hola demo');
});
