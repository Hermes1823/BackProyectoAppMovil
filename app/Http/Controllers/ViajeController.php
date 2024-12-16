<?php

namespace App\Http\Controllers;
use App\Models\Viaje;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;

class ViajeController extends Controller
{
    // Mostrar todos los viajes
    public function index()
    {
        $ListaViaje = Viaje::all();
        return response()->json($ListaViaje);
    }

    // Almacenar un nuevo viaje
    public function store(Request $request)
    {
        try {
            $viaje = new Viaje();
            $viaje->Destino = $request->Destino; // Ajuste para el campo 'Destino'
            $viaje->save();
            $result=[
                'Destino' => $viaje->Destino,
                'created' => true
            ];
            return $result;
        } catch (Exception $e) {
            return "Error fatal - " . $e->getMessage();
        }
    }

    // Mostrar un viaje específico
    public function show($id)
    {
        return Viaje::find($id);

    }

    // Actualizar un viaje existente
    public function update(Request $request, $id)
    {
        $viaje = Viaje::findOrFail($id);
        $viaje->update($request->all());
        return $viaje;
    }

    // Eliminar un viaje
    public function destroy($id)
    {
        $viaje = Viaje::findOrFail($id);
        $viaje->delete();
        return 204;
    }
    public function delete($id)
    {
        $viaje = Viaje::findOrFail($id);
        $viaje->delete();
        return 204;
    }

    public function generatePdf($id)
    {
        $viaje = Viaje::with(['detalleviajes'])->findOrFail($id);

        $pdf = Pdf::loadView('viaje', compact('viaje'));

        return $pdf->download('viaje_' . $id . '.pdf');
    }

    public function chartData()
    {
        $data = Viaje::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return response()->json([
            'chartData' => $data
        ]);
    }
}
