<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
 public function index()
 {
    $ListaEmpleados = Empleado::all();
    return response()->json($ListaEmpleados);
}

}
