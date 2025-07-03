@vite('resources/css/app.css')
<title>Spendings Report</title>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-xl font-bold mb-4">Spending Report</h1>

        <form method="GET" action="{{ route('spending.report') }}" class="flex flex-col md:flex-row items-center gap-3 mb-4">
            <input type="number" name="min" value="{{ $min }}" placeholder="Min Value"
                class="w-full md:w-1/4 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
            <input type="number" name="max" value="{{ $max }}" placeholder="Max Value"
                class="w-full md:w-1/4 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
            <button type="submit"
                class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Filter</button>
            <a href="{{ route('spending.export.excel', ['min' => $min, 'max' => $max]) }}"
                class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5">
                Export Excel
            </a>
            <a href="{{ route('spending.export.pdf', ['min' => $min, 'max' => $max]) }}"
                class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">
                Export PDF
            </a>
        </form>

        <div class="overflow-x-auto rounded-lg border">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-6 py-3">Employee</th>
                        <th class="px-6 py-3">Department</th>
                        <th class="px-6 py-3">Date</th>
                        <th class="px-6 py-3">Value</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($spendings as $s)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4">{{ $s->employee->employee_name }}</td>
                            <td class="px-6 py-4">{{ $s->employee->department->department_name }}</td>
                            <td class="px-6 py-4">{{ $s->spending_date }}</td>
                            <td class="px-6 py-4">Rp{{ number_format($s->value, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center px-6 py-4 text-gray-500">No data found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
