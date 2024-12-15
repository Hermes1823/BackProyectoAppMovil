<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LogeoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ViajeController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\TipoGastoController;
use App\Http\Controllers\DetalleViajeController;
use App\Http\Controllers\DetalleGastoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::resource('/producto', ProductoController::class);
Route::resource('/categoria', CategoriaController::class);
Route::resource('/cliente', ClienteController::class);
Route::resource('/empleado', EmpleadoController::class);




Route::get('/login/{email}',[UsuarioController::class,'verificaemail']);
Route::get('/login/{email}/{password}',[UsuarioController::class,'verificaclave']);
Route::post('/login/registrar',[UsuarioController::class,'registrar']);


Route::get('/login/{email}',[LogeoController::class,'verificaemail']);
Route::get('/login/{email}/{password}',[LogeoController::class,'verificaclave']);
Route::get('/usuarios', [LogeoController::class, 'listarUsuarios']);

Route::apiResource('viajes', ViajeController::class);
Route::apiResource('empleados', EmpleadoController::class);
Route::apiResource('tipogastos', TipoGastoController::class);
Route::apiResource('detalleviajes', DetalleViajeController::class);
Route::apiResource('detallegastos', DetalleGastoController::class);