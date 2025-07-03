<x-layout title="add Department">
<div class="max-w-xl mx-auto bg-white p-6 rounded-md shadow-lg"">
    <h1 class="text-xl font-bold mb-4">Add New Department</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <label class="block mb-2">Department Name:</label>
        <input type="text" name="department_name" class="w-full border rounded px-3 py-2 mb-4" required>

        <button type="submit" class="bg-blue-800 rounded-md text-white px-4 py-2 rounded">Save</button>
        <a href="{{ route('departments.index') }}" class="ml-2 text-gray-500">Cancel</a>
    </form>
</div>
</x-layout>
