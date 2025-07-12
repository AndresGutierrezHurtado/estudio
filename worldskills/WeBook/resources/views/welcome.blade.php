@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <div class="hero bg-base-200 min-h-screen">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold">¿No tienes cuenta aún?</h1>
                <p class="py-6">
                    Crea tu cuenta en la siguiente página para ser parte de esta comunidad
                </p>
                <a href="/register">
                    <button class="btn btn-primary">Registro</button>
                </a>
            </div>
            <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl">
                <div class="card-body">
                    <form action="/login" method="post">
                        @csrf
                        <fieldset class="fieldset">
                            <label class="label">Correo electrónico</label>
                            <input type="email" class="input" placeholder="Email" name="user_email" />
                        </fieldset>
                        @error('user_email')
                        <p class="text-sm text-error">
                            {{  $message }}
                        </p>
                        @enderror
                        <fieldset class="fieldset">
                            <label class="label">Contraseña</label>
                            <input type="password" class="input" placeholder="Password" name="user_password" />
                        </fieldset>
                        @error('user_password')
                        <p class="text-sm text-error">
                            {{  $message }}
                        </p>
                        @enderror
                        @if (Session::has('error'))
                        <p class="text-sm text-error">
                            {{  Session::get('error') }}
                        </p>
                        @endif
                        <div class="pt-4">
                            <button class="btn btn-neutral mt-4">Iniciar sesión</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
