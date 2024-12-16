<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use Barryvdh\DomPDF\Facade\Pdf;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $works = Work::all();

        return response()->json($works);
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
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $work = Work::create($validatedData);

        return response()->json($work, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $work = Work::with(['reports'])->findOrFail($id);

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
        $work = Work::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $work->update($validatedData);

        return response()->json($work);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $work = Work::findOrFail($id);
        $work->delete();

        return response()->json([
            'message' => 'Obra eliminada.'
        ]);
    }  
    
    public function generatePdf($id)
    {
        $work = Work::with(['reports'])->findOrFail($id);

        $pdf = Pdf::loadView('work', compact('work'));

        return $pdf->download('work_' . $id . '.pdf');
    }

    public function chartData()
    {
        $data = Work::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return response()->json([
            'chartData' => $data
        ]);
    }
}
