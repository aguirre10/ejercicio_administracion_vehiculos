<?php

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

Route::get('/vue', function () {
    return view('vue');
});

Route::get('/index', function () {
    return view('index');
});

//Route::get('/registrar_entrada', [VehiculoController::class, 'registrar_entrada'])->name('registrar.entrada');

Route::get('/registrar_entrada', function () {
    return view('registrar_entrada');
});

