<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\EstanciaController;

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
Route::get('/empleados', [App\Http\Controllers\EmpleadoController::class, 'index']);
Route::post('/save', [App\Http\Controllers\EmpleadoController::class, 'store']);

//VEHICULOS
Route::get('/verVehiculos/{tipo?}', [App\Http\Controllers\VehiculoController::class, 'verVehiculos']);
Route::post('/altaOficial', [App\Http\Controllers\VehiculoController::class, 'altaOficial']);
Route::post('/altaResidente', [App\Http\Controllers\VehiculoController::class, 'altaResidente']);

//ESTANCIAS
Route::post('/registrarEntrada', [App\Http\Controllers\EstanciaController::class, 'registrarEntrada']);
Route::post('/registrarSalida', [App\Http\Controllers\EstanciaController::class, 'registrarSalida']);
Route::post('/comienzaMes', [App\Http\Controllers\EstanciaController::class, 'comienzaMes']);
//PAGO RESIDENTES
Route::get('pagoResidentes/{nombreArchivo}', function ($nombreArchivo) {
    $controlador = new EstanciaController;
    return $controlador->pagoResidentes($nombreArchivo);
});




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

