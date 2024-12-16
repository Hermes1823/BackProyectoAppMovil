<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetalleViaje;
use Exception;

class DetalleViajeController extends Controller
{
    public function index()
    {
        // Devuelve todos los registros
        return response()->json(DetalleViaje::all());
    }

    public function store(Request $request)
    {
        try {
            // Crear un nuevo registro
            $detalleViaje = DetalleViaje::create([
                'IdViaje' => $request->IdViaje,
                'IdEmpleado' => $request->IdEmpleado,
                'FechaSalida' => $request->FechaSalida,
                'FechaRegreso' => $request->FechaRegreso,
            ]);
            return response()->json($detalleViaje, 201); // Código 201 para "creado"
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear el detalle del viaje', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($idViaje, $idEmpleado)
    {
        // Busca un registro específico
        $detalleViaje = DetalleViaje::where('IdViaje', $idViaje)
            ->where('IdEmpleado', $idEmpleado)
            ->first();

        if (!$detalleViaje) {
            return response()->json(['message' => 'Detalle del viaje no encontrado'], 404);
        }

        return response()->json($detalleViaje);
    }

    public function update(Request $request, $idViaje, $idEmpleado)
    {
        try {
            // Actualiza un registro específico
            $detalleViaje = DetalleViaje::where('IdViaje', $idViaje)
                ->where('IdEmpleado', $idEmpleado)
                ->firstOrFail();

            $detalleViaje->update($request->all());
            return response()->json($detalleViaje);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar el detalle del viaje', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($idViaje, $idEmpleado)
    {
        try {
            // Elimina un registro específico
            $detalleViaje = DetalleViaje::where('IdViaje', $idViaje)
                ->where('IdEmpleado', $idEmpleado)
                ->firstOrFail();

            $detalleViaje->delete();
            return response()->json(null, 204); // Código 204 para "sin contenido"
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el detalle del viaje', 'error' => $e->getMessage()], 500);
        }
    }
}
