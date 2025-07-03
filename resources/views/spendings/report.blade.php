<x-layout title="Spendings Report">
    <div class="bg-white p-6 rounded shadow font-inter">
        <h1 class="text-xl font-bold mb-6">Spending Report</h1>

        {{-- Filter + Export Buttons Row --}}
        <div class="mb-6 flex flex-wrap justify-between items-center gap-4">
            {{-- Filter Form --}}
            <form method="GET" action="{{ route('spending.report') }}" class="flex gap-4 flex-wrap items-center">
                <input
                    type="number"
                    name="min"
                    value="{{ request('min', '') }}"
                    placeholder="Min Value"
                    class="border rounded px-3 py-2 text-sm"
                    min="0"
                >
                <input
                    type="number"
                    name="max"
                    value="{{ request('max', '') }}"
                    placeholder="Max Value"
                    class="border rounded px-3 py-2 text-sm"
                    min="0"
                >
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm">
                    Filter
                </button>
            </form>

            {{-- Export Buttons --}}
            <div class="flex gap-2">
                <a href="{{ route('reports.export.excel', request()->query()) }}"
                    class="bg-green-600 hover:bg-green-700 text-white font-medium rounded px-4 py-2 text-sm">
                    Export to Excel
                </a>
                <a href="{{ route('reports.export.pdf', request()->query()) }}"
                    class="bg-red-600 hover:bg-red-700 text-white font-medium rounded px-4 py-2 text-sm">
                    Export to PDF
                </a>
            </div>
        </div>

        {{-- Tabel Report --}}
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm border border-gray-300">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 border border-gray-300 text-left">Employee</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Department</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Date</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Value</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($spendings as $s)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 text-gray-800">
                            <td class="px-4 py-2 border border-gray-300">{{ $s->employee->employee_name }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $s->employee->department->department_name }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ \Carbon\Carbon::parse($s->spending_date)->format('d-m-Y') }}</td>
                            <td class="px-4 py-2 border border-gray-300">Rp{{ number_format($s->value, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500">No data found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
