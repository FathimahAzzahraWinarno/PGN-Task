<x-layout title="Create Spending">
<div class="max-w-xl mx-auto bg-white p-6 rounded-md shadow-lg"">
    <h1 class="text-xl font-bold mb-4">Add New Spending</h1>

    <form action="{{ route('spendings.store') }}" method="POST">
        @csrf

        <label class="block mb-2">Employee:</label>
        <select name="employee_id" class="w-full border rounded px-3 py-2 mb-4" required>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->employee_name }}</option>
            @endforeach
        </select>

        <label class="block mb-2">Spending Date:</label>
        <input type="date" name="spending_date" class="w-full border rounded px-3 py-2 mb-4" required>

        <label class="block mb-2">Value:</label>
        <input type="number" name="value" class="w-full border rounded px-3 py-2 mb-4" required>

        <button type="submit" class="bg-blue-800 rounded-md text-white px-4 py-2 rounded">Save</button>
        <a href="{{ route('spendings.index') }}" class="ml-2 text-gray-500">Cancel</a>
    </form>
</div>
</x-layout>
