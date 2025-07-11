<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | WEBOOK PLATAFORMA PARA AGENDAR CITAS EN SALAS DE LIBROS</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="w-full min-h-screen flex flex-col">
    <main class="w-full">
        @yield('content')
    </main>
</body>
</html>