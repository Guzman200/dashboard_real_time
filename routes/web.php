<?php

use App\Events\MyEvent;
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

Route::get('/employees_list',[App\Http\Controllers\EmployeesController::class, 'list'])->name('employees_list');

Route::get('test', function(){

    event(new MyEvent('hello world'));
    //Pusher::trigger('my-channel', 'my-event', 'Hola demo');
});
