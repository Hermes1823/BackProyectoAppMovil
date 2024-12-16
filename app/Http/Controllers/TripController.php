<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use Barryvdh\DomPDF\Facade\Pdf;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trips = Trip::all();

        return response()->json($trips);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'destination' => 'required|string|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required|string|max:255'
        ]);

        $trip = Trip::create($validatedData);

        return response()->json($trip, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $trip = Trip::with(['reports'])->findOrFail($id);

        return response()->json($trip);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $trip = Trip::findOrFail($id);

        $validatedData = $request->validate([
            'destination' => 'required|string|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required|string|max:255'
        ]);

        $trip->update($validatedData);

        return response()->json($trip);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $trip = Trip::findOrFail($id);
        $trip->delete();

        return response()->json([
            'message' => 'Viaje eliminado.'
        ]);
    }

    public function generatePdf($id)
    {
        $trip = Trip::with(['reports'])->findOrFail($id);

        $pdf = Pdf::loadView('trip', compact('trip'));

        return $pdf->download('trip_' . $id . '.pdf');
    }

    public function chartData()
    {
        $data = Trip::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return response()->json([
            'chartData' => $data
        ]);
    }
}
