<?php

namespace App\Exports;

use App\Models\Spending;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SpendingReportExport implements FromCollection, WithHeadings
{
    protected $min, $max;

    public function __construct($min = 0, $max = 1000000000)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function collection()
    {
        return Spending::with('employee.department')
            ->whereYear('spending_date', '>=', 2020)
            ->whereYear('spending_date', '<=', now()->year)
            ->whereBetween('value', [$this->min, $this->max])
            ->orderBy('value', 'asc')
            ->get()
            ->map(function ($item) {
                return [
                    'Employee Name' => $item->employee->employee_name,
                    'Department' => $item->employee->department->department_name,
                    'Spending Date' => $item->spending_date,
                    'Value' => $item->value,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Employee Name',
            'Department',
            'Spending Date',
            'Value',
        ];
    }
}
