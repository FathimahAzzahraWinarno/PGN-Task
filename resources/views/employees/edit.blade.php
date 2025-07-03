<x-layout title="Edit Employee">
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Edit Employee</h1>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label class="block mb-2">Employee Name:</label>
        <input type="text" name="employee_name" value="{{ $employee->employee_name }}" class="w-full border rounded px-3 py-2 mb-4" required>

        <label class="block mb-2">Department:</label>
        <select name="department_id" class="w-full border rounded px-3 py-2 mb-4" required>
            @foreach($departments as $department)
                <option value="{{ $department->id }}" {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                    {{ $department->department_name }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('employees.index') }}" class="ml-2 text-gray-500">Cancel</a>
    </form>
</div>
</x-layout>
