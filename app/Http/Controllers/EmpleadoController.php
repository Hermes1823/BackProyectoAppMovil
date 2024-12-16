<?php

namespace App\Http\Controllers;
use App\Models\Empleado;
use Exception;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $ListaEmpleado = Empleado::all();
        return response()->json($ListaEmpleado);
    }

    public function store(Request $request)
    {
        try {
            $empleado = new Empleado();
            $empleado->Nombre = $request->Nombre;
            $empleado->Telefono = $request->Telefono;
            $empleado->Cargo = $request->Cargo;
            $empleado->save();
            $result = [
                'Nombre' => $empleado->Nombre,
                'Telefono' => $empleado->Telefono,
                'Cargo' => $empleado->Cargo,
                'created' => true
            ];
            return $result;
        } catch (Exception $e) {
            return "Error fatal - " . $e->getMessage();
        }
    }
    public function show($id)
    {
        return Empleado::find($id);
    }
    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->update($request->all());
        return $empleado;
    }

    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return 204;
    }


    public function delete($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return 204;
    }
}
