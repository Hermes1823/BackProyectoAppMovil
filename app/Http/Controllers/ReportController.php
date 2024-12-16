<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Trip;
use App\Models\Work;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::all();

        return response()->json($reports);
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
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'trip_id' => 'nullable|exists:trips,id',
            'work_id' => 'nullable|exists:works,id'
        ]);

        $report = Report::create($validatedData);

        return response()->json($report,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $report = Report::with(['trip', 'work'])->findOrFail($id);

        return response()->json($report);
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
        $report = Report::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'trip_id' => 'nullable|exists:trips,id',
            'work_id' => 'nullable|exists:works,id'
        ]);

        $report->update($validatedData);

        return response()->json($report);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        return response()->json([
            'message' => 'Reporte eliminado.'
        ]);
    }

    public function generatePdf($id)
    {
        $report = Report::with(['trip', 'work'])->findOrFail($id);

        $pdf = Pdf::loadView('report', compact('report'));

        return $pdf->download('report_' . $id . '.pdf');
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
