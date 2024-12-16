<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\LogeoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\GastoController;

use App\Http\Controllers\TripController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\ReportController;

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

//

Route::prefix('report')->group(function () {
    Route::get('/', [ReportController::class, 'index'])->name('report.index');
    Route::post('/', [ReportController::class, 'store'])->name('report.store');
    Route::get('/{id}', [ReportController::class, 'show'])->name('report.show');
    Route::put('/{id}', [ReportController::class, 'update'])->name('report.update');
    Route::delete('/{id}', [ReportController::class, 'destroy'])->name('report.destroy');
    Route::get('/{id}/pdf', [ReportController::class, 'generatePdf'])->name('report.generatePdf');
    Route::get('/chart-data', [ReportController::class, 'chartData'])->name('report.chartData');
});

Route::prefix('work')->group(function () {
    Route::get('/', [WorkController::class, 'index'])->name('work.index');
    Route::post('/', [WorkController::class, 'store'])->name('work.store');
    Route::get('/{id}', [WorkController::class, 'show'])->name('work.show');
    Route::put('/{id}', [WorkController::class, 'update'])->name('work.update');
    Route::delete('/{id}', [WorkController::class, 'destroy'])->name('work.destroy');
    Route::get('/{id}/pdf', [WorkController::class, 'generatePdf'])->name('work.generatePdf');
    Route::get('/chart-data', [WorkController::class, 'chartData'])->name('work.chartData');
});

Route::prefix('trip')->group(function () {
    Route::get('/', [TripController::class, 'index'])->name('trip.index');
    Route::post('/', [TripController::class, 'store'])->name('trip.store');
    Route::get('/{id}', [TripController::class, 'show'])->name('trip.show');
    Route::put('/{id}', [TripController::class, 'update'])->name('trip.update');
    Route::delete('/{id}', [TripController::class, 'destroy'])->name('trip.destroy');
    Route::get('/{id}/pdf', [TripController::class, 'generatePdf'])->name('trip.generatePdf');
    Route::get('/chart-data', [TripController::class, 'chartData'])->name('trip.chartData');
});