<?php

namespace App\Http\Controllers;

use App\Models\Spending;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpendingController extends Controller
{
    public function index(Request $request)
    {
        $spendings = Spending::with('employee');

        // Optional: pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $spendings->whereHas('employee', function ($q) use ($search) {
                $q->where('employee_name', 'like', "%$search%");
            });
        }

        $spendings = $spendings->get();
        return view('spendings.index', compact('spendings'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('spendings.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'spending_date' => 'required|date',
            'value' => 'required|numeric|min:0',
        ]);

        Spending::create($request->only('employee_id', 'spending_date', 'value'));

        return redirect()->route('spendings.index')->with('success', 'Spending created.');
    }

    public function edit(Spending $spending)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak: Hanya Admin yang dapat melakukan aksi ini.');
        }

        $employees = Employee::all();
        return view('spendings.edit', compact('spending', 'employees'));
    }

    public function update(Request $request, Spending $spending)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak: Hanya Admin yang dapat melakukan aksi ini.');
        }

        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'spending_date' => 'required|date',
            'value' => 'required|numeric|min:0',
        ]);

        $spending->update($request->only('employee_id', 'spending_date', 'value'));

        return redirect()->route('spendings.index')->with('success', 'Spending updated.');
    }

    public function destroy(Spending $spending)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak: Hanya Admin yang dapat melakukan aksi ini.');
        }

        $spending->delete();
        return redirect()->route('spendings.index')->with('success', 'Spending deleted.');
    }
}
