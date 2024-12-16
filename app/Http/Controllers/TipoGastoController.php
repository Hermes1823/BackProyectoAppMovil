<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoGasto;
use Barryvdh\DomPDF\Facade\Pdf;

class TipoGastoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoGastos = TipoGasto::all();

        return response()->json($tipoGastos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'descripcion' => 'required|string|max:255'
        ]);

        $tipoGasto = TipoGasto::create($validatedData);

        return response()->json($tipoGasto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tipoGasto = TipoGasto::with(['detallegastos'])->findOrFail($id);

        return response()->json($tipoGasto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tipoGasto = TipoGasto::findOrFail($id);

        $validatedData = $request->validate([
            'descripcion' => 'required|string|max:255'
        ]);

        $tipoGasto->update($validatedData);

        return response()->json($tipoGasto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tipoGasto = TipoGasto::findOrFail($id);
        $tipoGasto->delete();

        return response()->json([
            'message' => 'Tipo de gasto eliminado.'
        ]);
    }

    public function generatePdf($id)
    {
        $tipoGasto = TipoGasto::with(['detallegastos'])->findOrFail($id);

        $pdf = Pdf::loadView('tipoGasto', compact('tipoGasto'));

        return $pdf->download('tipoGasto_' . $id . '.pdf');
    }

    public function chartData()
    {
        $data = TipoGasto::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return response()->json([
            'chartData' => $data
        ]);
    }
}
