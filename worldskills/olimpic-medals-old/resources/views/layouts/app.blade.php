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
            <ul class="menu bg-base-300 text-base-content min-h-full w-80 p-4 gap-10">
                <figure class="flex flex-col w-full h-25 pt-2">
                    <svg viewBox="0 0 799.87 368" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <path
                            d="M641.79 248.31c-3.34 55.04-49.11 98.64-105 98.64-58.16 0-105.24-47.05-105.24-105.13 0-46.65 30.37-86.2 72.47-99.95.77-5.12 1.16-10.36 1.16-15.7 0-2.19-.08-4.34-.18-6.49-54.38 14.08-94.53 63.43-94.53 122.14 0 69.67 56.52 126.18 126.32 126.18 66.32 0 120.73-51.14 125.85-116.13a127.53 127.53 0 0 1-20.85-3.56zm-105-111.63c52.74 0 96.47 38.82 104.07 89.46 6.93 2.25 14.19 3.81 21.7 4.61-5.63-64.5-59.8-115.09-125.77-115.09-3.69 0-7.34.16-10.92.46.23 3.32.37 6.67.37 10.05 0 3.74-.19 7.44-.47 11.08 3.61-.38 7.28-.57 11.02-.57z"
                            fill="#00a651" />
                        <path
                            d="M389 251.86c-5.11 65-59.5 116.14-125.87 116.14-69.78 0-126.32-56.51-126.32-126.18 0-58.71 40.15-108.05 94.55-122.13.09 2.13.16 4.29.16 6.48 0 5.34-.4 10.58-1.16 15.7-42.09 13.76-72.45 53.31-72.45 99.95 0 58.07 47.06 105.14 105.22 105.14 55.92 0 101.69-43.6 105.02-98.65a126.64 126.64 0 0 0 20.85 3.55zM252.11 137.25c.3-3.64.49-7.34.49-11.08 0-3.38-.14-6.73-.37-10.04 3.58-.3 7.22-.47 10.9-.47 65.97 0 120.22 50.6 125.84 115.1-7.56-.81-14.83-2.37-21.76-4.61-7.59-50.65-51.33-89.47-104.08-89.47-3.73 0-7.41.19-11.02.57z"
                            fill="#fcb131" />
                        <path
                            d="M799.87 126.17c0 69.68-56.53 126.17-126.3 126.17-66.04 0-120.2-50.58-125.82-115.1 7.55.79 14.78 2.37 21.74 4.62 7.57 50.63 51.27 89.46 104.08 89.46 58.12 0 105.24-47.09 105.24-105.15 0-58.05-47.12-105.14-105.24-105.14-55.97 0-101.7 43.6-105.04 98.66a128.73 128.73 0 0 0-20.89-3.57C552.81 51.13 607.2 0 673.57 0c69.77 0 126.3 56.49 126.3 126.17z"
                            fill="#ee334e" />
                        <path
                            d="M399.92 231.32c-52.75 0-96.49-38.83-104.08-89.45-6.94-2.26-14.18-3.84-21.74-4.62 5.63 64.51 59.8 115.09 125.82 115.09 3.71 0 7.36-.15 10.96-.47-.25-3.29-.4-6.66-.4-10.05 0-3.73.19-7.43.5-11.06-3.64.37-7.32.56-11.06.56zm0-231.32c-66.37 0-120.74 51.13-125.88 116.12 7.15.63 14.07 1.83 20.87 3.57 3.31-55.06 49.07-98.66 105.01-98.66 58.16 0 105.27 47.09 105.27 105.14 0 46.64-30.39 86.2-72.49 99.98-.75 5.09-1.14 10.34-1.14 15.67 0 2.19.01 4.36.16 6.49 54.38-14.08 94.53-63.42 94.53-122.14C526.24 56.49 469.71 0 399.92 0z" />
                        <path
                            d="M252.6 126.17C252.6 56.49 196.07 0 126.28 0 56.55 0 0 56.49 0 126.17s56.55 126.17 126.28 126.17c3.7 0 7.32-.15 10.93-.47-.25-3.3-.4-6.66-.4-10.05 0-3.73.2-7.43.49-11.06-3.62.37-7.29.56-11.02.56-58.12 0-105.25-47.09-105.25-105.15 0-58.05 47.13-105.14 105.25-105.14 58.15 0 105.24 47.09 105.24 105.14 0 46.64-30.39 86.2-72.48 99.98-.74 5.09-1.13 10.34-1.13 15.67 0 2.19.01 4.36.16 6.49 54.38-14.08 94.53-63.42 94.53-122.14z"
                            fill="#0081c8" />
                    </svg>
                </figure>
                <div class="grow flex flex-col gap-2">
                    <!-- Sidebar content here -->
                    <li>
                        <a href="/ranking" class="{{ request()->is('ranking') ? 'text-primary font-semibold' : '' }}">🏆 Ranking</a>
                    </li>
                    <li>
                        <a href="/" class="{{ request()->is('/') ? 'text-primary font-semibold' : '' }}">🌍 Lista países</a>
                    </li>
                    <li>
                        <a href="/countries" class="{{ request()->is('countries') ? 'text-primary font-semibold' : '' }}">📝 Gestión de países</a>
                    </li>
                    <li>
                        <a href="/medals" class="{{ request()->is('medals') ? 'text-primary font-semibold' : '' }}">🥇 Gestión de medallas</a>
                    </li>
                    <li>
                        <a href="/competitors" class="{{ request()->is('competitors') ? 'text-primary font-semibold' : '' }}">👤 Gestión de competidores</a>
                    </li>
                </div>
                <footer class="flex flex-col gap-2 mt-auto">
                    <p class="text-sm text-base-content/50">
                        &copy; Sistema de gestión de medallas olímpicas, {{ date('Y') }} - Todos los derechos
                        reservados
                    </p>
                </footer>
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
