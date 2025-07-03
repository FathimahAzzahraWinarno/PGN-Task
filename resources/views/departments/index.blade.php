<x-layout title="Departments">
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="p-4 flex justify-between items-center">
        <h2 class="text-xl font-bold">Department List</h2>
        <a href="{{ route('departments.create') }}" class="bg-blue-800 hover:bg-blue-900 rounded-md text-white px-4 py-2 rounded">
            + Add Department
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 mx-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($departments as $department)
                    <tr x-data="{ modal: false, confirmModal: false }">
                        <td class="px-6 py-4">{{ $department->id }}</td>
                        <td class="px-6 py-4">{{ $department->department_name }}</td>
                        <td class="px-6 py-4 space-x-2">
                            @if(Auth::user()->role === 'admin')
                                <a href="{{ route('departments.edit', $department->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                <button @click="confirmModal = true" class="text-red-500 hover:text-red-700">Delete</button>

                                <!-- Modal Konfirmasi Delete -->
                                <div x-show="confirmModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                                    <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm text-center">
                                        <h2 class="text-lg font-bold text-red-600 mb-2">Konfirmasi Hapus</h2>
                                        <p class="text-gray-700 mb-4">Yakin ingin menghapus data ini?</p>
                                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                                                Ya, Hapus
                                            </button>
                                        </form>
                                        <button @click="confirmModal = false"
                                                class="ml-2 px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
                                            Batal
                                        </button>
                                    </div>
                                </div>
                            @else
                                <button @click="modal = true" class="text-gray-400 cursor-not-allowed">Edit</button>
                                <button @click="modal = true" class="text-gray-400 cursor-not-allowed">Delete</button>

                                <!-- Modal Akses Ditolak -->
                                <div x-show="modal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                                    <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm text-center">
                                        <h2 class="text-lg font-bold text-red-600 mb-2">Akses Ditolak</h2>
                                        <p class="text-gray-700 mb-4">Hanya Admin yang dapat melakukan aksi ini.</p>
                                        <button @click="modal = false"
                                                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                                            Tutup
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</x-layout>
