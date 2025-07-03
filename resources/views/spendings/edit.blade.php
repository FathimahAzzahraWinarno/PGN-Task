<x-layout title="Edit Spending">
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Edit Spending</h1>

    <form action="{{ route('spendings.update', $spending->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label class="block mb-2">Employee:</label>
        <select name="employee_id" class="w-full border rounded px-3 py-2 mb-4" required>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}" {{ $employee->id == $spending->employee_id ? 'selected' : '' }}>
                    {{ $employee->employee_name }}
                </option>
            @endforeach
        </select>

        <label class="block mb-2">Spending Date:</label>
        <input type="date" name="spending_date" value="{{ $spending->spending_date }}" class="w-full border rounded px-3 py-2 mb-4" required>

        <label class="block mb-2">Value:</label>
        <input type="number" name="value" value="{{ $spending->value }}" class="w-full border rounded px-3 py-2 mb-4" required>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('spendings.index') }}" class="ml-2 text-gray-500">Cancel</a>
    </form>
</div>
</x-layout>
