<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetalleGasto;
use Barryvdh\DomPDF\Facade\Pdf;

class DetalleGastoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detalleGastos = DetalleGasto::all();

        return response()->json($detalleGastos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'IdTipogasto' => 'nullable|exists:detallegastos,id',
            'IdViaje' => 'nullable|exists:viajes,id',
            'IdEmpleado' => 'nullable|exists:empleados,id',
            'Monto' => 'required|number',
            'Fecha' => 'required'
        ]);

        $detalleGasto = DetalleGasto::create($validatedData);

        return response()->json($detalleGasto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $detalleGasto = DetalleGasto::with(['tipogasto', 'viaje', 'empleado'])->findOrFail($id);

        return response()->json($detalleGasto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $detalleGasto = DetalleGasto::findOrFail($id);

        $validatedData = $request->validate([
            'IdTipogasto' => 'nullable|exists:detallegastos,id',
            'IdViaje' => 'nullable|exists:viajes,id',
            'IdEmpleado' => 'nullable|exists:empleados,id',
            'Monto' => 'required|number',
            'Fecha' => 'required'
        ]);

        $detalleGasto->update($validatedData);

        return response()->json($detalleGasto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $detalleGasto = DetalleGasto::findOrFail($id);
        $detalleGasto->delete();

        return response()->json([
            'message' => 'Detalle de gasto eliminado.'
        ]);
    }

    public function generatePdf($id)
    {
        $detalleGasto = DetalleGasto::with(['tipogasto', 'viaje', 'empleado'])->findOrFail($id);

        $pdf = Pdf::loadView('detalleGasto', compact('detalleGasto'));

        return $pdf->download('detalleGasto_' . $id . '.pdf');
    }

    public function chartData()
    {
        $data = DetalleGasto::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return response()->json([
            'chartData' => $data
        ]);
    }
}
