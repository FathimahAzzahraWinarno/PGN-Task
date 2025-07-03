@props(['title'])
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'PGN' }}</title>

    {{-- CSS --}}
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- JS Libraries --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <script>
        window.addEventListener("DOMContentLoaded", () => {
            lucide.createIcons();
        });
    </script>
</head>

<body class="h-full bg-white">
    <div class="min-h-full bg-white">
        <x-navbar />

        <main class="min-h-screen p-6">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
