<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gasto;  // Asegúrate de tener este modelo en App\Models\Gasto
use Exception;

class GastoController extends Controller
{
    // Método para obtener todos los gastos
    public function index()
    {
        try {
            $ListaGastos = Gasto::all();  // Obtener todos los gastos de la base de datos
            return response()->json($ListaGastos);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error fatal - ' . $e->getMessage()], 500);
        }
    }

    // Método para almacenar un nuevo gasto
    public function store(Request $request)
    {
        try {
            // Validar los datos entrantes
            $validatedData = $request->validate([
                'titulo' => 'required|string|max:20',
                'monto' => 'required|integer',
                'categoria' => 'required|string|max:20',
            ]);

            $gasto = new Gasto();
            $gasto->titulo = $request->titulo;
            $gasto->monto = $request->monto;
            $gasto->categoria = $request->categoria;

            $gasto->save();

            // Crear una respuesta con el gasto recién creado
            $result = [
                'titulo' => $gasto->titulo,
                'monto' => $gasto->monto,
                'categoria' => $gasto->categoria,
                'created' => true
            ];
            return response()->json($result);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error fatal - ' . $e->getMessage()], 500);
        }
    }

    // Método para mostrar un gasto específico por su ID
    public function show($id)
    {
        try {
            $gasto = Gasto::find($id);
            if (!$gasto) {
                return response()->json(['error' => 'Gasto no encontrado'], 404);
            }
            return response()->json($gasto);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error fatal - ' . $e->getMessage()], 500);
        }
    }

    // Método para actualizar un gasto específico
    public function update(Request $request, $id)
    {
        try {
            // Validar los datos entrantes
            $validatedData = $request->validate([
                'titulo' => 'required|string|max:20',
                'monto' => 'required|integer',
                'categoria' => 'required|string|max:20',
            ]);

            $gasto = Gasto::findOrFail($id);
            $gasto->update($request->all());
            return response()->json($gasto);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error fatal - ' . $e->getMessage()], 500);
        }
    }

    // Método para eliminar un gasto específico
    public function destroy($id)
    {
        try {
            $gasto = Gasto::findOrFail($id);
            $gasto->delete();
            return response()->json(null, 204);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error fatal - ' . $e->getMessage()], 500);
        }
    }
}

