<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Spending Report</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; margin: 20px; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { border-collapse: collapse; width: 100%; margin: auto; }
        th, td { border: 1px solid #444; padding: 6px 8px; text-align: left; }
        th { background-color: #eee; }
        td.value { text-align: right; }
        tfoot td { font-weight: bold; text-align: right; }
    </style>
</head>
<body>
    <h2>Laporan Pengeluaran</h2>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Employee</th>
                <th>Department</th>
                <th>Date</th>
                <th>Value (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach ($spendings as $index => $s)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $s->employee->employee_name }}</td>
                    <td>{{ $s->employee->department->department_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($s->spending_date)->format('d-m-Y') }}</td>
                    <td class="value">{{ number_format($s->value, 0, ',', '.') }}</td>
                </tr>
                @php $total += $s->value; @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" style="text-align: center;">Total</td>
                <td class="value">{{ number_format($total, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
