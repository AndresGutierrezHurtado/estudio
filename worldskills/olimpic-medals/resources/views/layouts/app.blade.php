<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | Sistema de gestión de medallas olímpicas</title>

    {{-- Styles --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col p-1">
            <!-- Page content here -->
            <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">
                Menú
            </label>
            @yield('content')
        </div>
        <div class="drawer-side">
            <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="menu bg-base-200 text-base-content min-h-full w-80 p-4">
                <!-- Sidebar content here -->
                <li><a href="/">Lista paises</a></li>
                <li><a href="/countries">Gestión de paises</a></li>
                <li><a href="/medals">Gestión de medallas</a></li>
            </ul>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            $searchInput = document.getElementById('search-input');

            document.addEventListener('keydown', (e) => {
                if (e.altKey && e.key.toLowerCase() === 's' && $searchInput) {
                    $searchInput.focus();
                }
            })
        });
    </script>
</body>

</html>
