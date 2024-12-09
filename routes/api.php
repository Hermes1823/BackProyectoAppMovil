<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\LogeoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\GastoController;
use App\Models\Gasto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::resource('/producto', ProductoController::class);
Route::resource('/categoria', CategoriaController::class);
Route::resource('/cliente', ClienteController::class);
Route::resource('/empleado', EmpleadoController::class);
Route::resource('/gasto', GastoController::class);



Route::get('/login/{email}',[UsuarioController::class,'verificaemail']);
Route::get('/login/{email}/{password}',[UsuarioController::class,'verificaclave']);
Route::post('/login/registrar',[UsuarioController::class,'registrar']);


Route::get('/login/{email}',[LogeoController::class,'verificaemail']);
Route::get('/login/{email}/{password}',[LogeoController::class,'verificaclave']);
Route::get('/usuarios', [LogeoController::class, 'listarUsuarios']);