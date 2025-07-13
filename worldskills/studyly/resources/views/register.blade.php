@extends('layouts.app')

@section('title', 'Crea tu cuenta')

@section('content')
    <div class="w-full grow flex flex-row-reverse gap-5">
        <section class="w-full lg:w-2/5 p-5 flex flex-col gap-8">
            <header class="space-y-2">
                <h1 class="text-4xl font-extrabold">Bienvenido a StudyLy</h1>
                <p class="text-lg text-base-content/80 leading-tight">Acá podrás postularte para acceder a un apoyo económico
                    y hacer que tu proceso de estudio sea mejor.</p>
                <p class="text-lg text-base-content/80 leading-tight">Ingresa tus credenciales para acceder a la plataforma.
                </p>
            </header>
            <form action="/login" method="POST" class="space-y-4 grow">
                @csrf
                <fieldset class="fieldset">
                    <label for="" class="fieldset-label text-base">Correo electrónico</label>
                    <input type="text" name="user_email" class="input" placeholder="Ingresa tu correo electrónico">
                </fieldset>
                <fieldset class="fieldset">
                    <label for="" class="fieldset-label text-base">Contraseña</label>
                    <input type="text" name="user_password" class="input" placeholder="Ingresa tu contraseña">
                </fieldset>
                @if (session()->has('error'))
                    <p class="text-error">
                        {{ session('error') }}
                    </p>
                @endif
                <fieldset class="fieldset py-5">
                    <button class="btn btn-primary">
                        Iniciar sesión
                    </button>
                </fieldset>
            </form>
            <footer class="text-lg text-base-content/60 font-medium">
                &copy; Andrés Gutiérrez, 2025.
            </footer>
        </section>
        <section class="w-full lg:w-3/5 p-2 flex flex-col overflow-hidden">
            <div class="w-full grow bg-secondary text-secondary-content rounded-lg flex flex-col items-center justify-center">
                <div class="w-full max-w-lg text-center flex flex-col items-center">
                    <h1 class="text-3xl font-bold mb-2">¿Aún no tienes cuenta?</h1>
                    <p class="text-lg mb-6">Si aún no has creado tu cuenta puedes ir y regístrarte en el siguiente botón</p>
                    <a href="/register" class="btn py-1">Registro</a>
                </div>
            </div>
        </section>
    </div>
@endsection
