<x-layout title="Add Employee">
<div class="max-w-xl mx-auto bg-white p-6 rounded-md shadow-lg">
    <h1 class="text-xl font-bold mb-4">Add New Employee</h1>

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <label class="block mb-2">Employee Name:</label>
        <input type="text" name="employee_name" class="w-full border rounded px-3 py-2 mb-4" required>

        <label class="block mb-2">Department:</label>
        <select name="department_id" class="w-full border rounded px-3 py-2 mb-4" required>
            @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
            @endforeach
        </select>

        <button type="submit" class="bg-blue-800 rounded-md text-white px-4 py-2 rounded">Save</button>
        <a href="{{ route('employees.index') }}" class="ml-2 text-gray-500">Cancel</a>
    </form>
</div>
</x-layout>
