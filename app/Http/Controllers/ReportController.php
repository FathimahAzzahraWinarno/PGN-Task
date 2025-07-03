<?php

namespace App\Http\Controllers;

use App\Models\Spending;
use Illuminate\Http\Request;
use App\Exports\SpendingReportExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $min = $request->filled('min') ? $request->min : 0;
        $max = $request->filled('max') ? $request->max : 1000000000;

        $currentYear = Carbon::now()->year;

        $spendings = Spending::with(['employee.department'])
            ->whereYear('spending_date', '>=', 2020)
            ->whereYear('spending_date', '<=', $currentYear)
            ->whereBetween('value', [$min, $max])
            ->orderBy('value', 'asc')
            ->get();

        return view('spendings.report', compact('spendings', 'min', 'max'));
    }

    public function exportExcel(Request $request)
    {
        $min = $request->filled('min') ? $request->min : 0;
        $max = $request->filled('max') ? $request->max : 1000000000;

        return Excel::download(new SpendingReportExport($min, $max), 'spending_report.xlsx');
    }

    public function exportPdf(Request $request)
    {
        $min = $request->filled('min') ? $request->min : 0;
        $max = $request->filled('max') ? $request->max : 1000000000;

        $currentYear = Carbon::now()->year;

        $spendings = Spending::with('employee.department')
            ->whereYear('spending_date', '>=', 2020)
            ->whereYear('spending_date', '<=', $currentYear)
            ->whereBetween('value', [$min, $max])
            ->orderBy('value', 'asc')
            ->get();

        $pdf = PDF::loadView('spendings.pdf', compact('spendings', 'min', 'max'));
        return $pdf->download('spending_report.pdf');
    }
}
