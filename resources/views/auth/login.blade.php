@vite('resources/css/app.css')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-white via-blue-90 to-blue-400">
    <div class="w-full max-w-md bg-white rounded-lg p-8 shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label class="block mb-2 text-sm font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border px-3 py-2 mb-4 rounded" required autofocus>

            <label class="block mb-2 text-sm font-medium">Password</label>
            <input type="password" name="password" class="w-full border px-3 py-2 mb-6 rounded" required>

            <button type="submit" class="w-full bg-blue-800 rounded-md text-white py-2 rounded hover:bg-blue-900">Login</button>
        </form>
    </div>
</div>

