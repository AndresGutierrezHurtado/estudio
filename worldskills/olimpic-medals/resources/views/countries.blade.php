@extends('layouts.app')

@section('title', 'Gestión de paises')

@section('content')
    <section class="w-full px-5">
        <div class="w-full max-w-[1200px] mx-auto py-10 space-y-8">
            <h1 class="text-4xl font-extrabold">Gestión de paises</h1>
            <div class="w-full space-y-5">
                {{-- Filters --}}
                <div class="w-full flex justify-between items-center">
                    <form action="" method="get" class="w-full max-w-sm">
                        <fieldset class="w-full fieldset flex flex-row">
                            <label for="seach" class="input">
                                <input type="text" name="search" id="search" placeholder="Buscar país"
                                    value="{{ request('search') }}">
                            </label>
                            <button class="btn">Buscar</button>
                            @if (request('search'))
                                <a href="/countries" type="reset" class="btn">Reiniciar</a>
                            @endif
                        </fieldset>
                    </form>
                </div>

                {{-- Table --}}
                <div class="w-full bg-base-200 rounded border-base-300">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th># Medallas</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($countries as $country)
                                <tr>
                                    <td>{{ $country['country_code'] }}</td>
                                    <td class="capitalize">{{ $country['country_name'] }}</td>
                                    <td>
                                        <div class="tooltip cursor-pointer"
                                            data-tip="{{ $country['gold_medals'] }} de oro, {{ $country['silver_medals'] }} de plata, {{ $country['bronze_medals'] }} de bronce">
                                            {{ $country['total_medals'] }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-fit flex flex-wrap gap-2 items-center justify-center">
                                            <button
                                                onclick="document.getElementById('edit-{{ $country['country_id'] }}').show()"
                                                class="btn btn-primary">
                                                Editar
                                            </button>
                                            <form action="/countries/{{ $country['country_id'] }}" method="post"
                                                onsubmit="return confirm('¿Estás seguro que quieres eliminar el país? Esta acción es irrevertible');">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-outline">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <p class="text-center text-lg">No se encontraron resultados...</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="mt-2">
                    {{ $countries->links('layouts.pagination') }}
                </div>
            </div>
        </div>
    </section>

    <dialog class="modal" id="create">
        <div class="modal-box">
            <h1 class="text-xl font-bold mb-4">Crear país</h1>
            <form action="/countries" method="POST">
                @csrf
                <fieldset class="fieldset">
                    <label for="country_name" class="fieldset-label">
                        Nombre
                    </label>
                    <input type="text" class="input" name="country_name" placeholder="Ingresa el nombre del pais"
                        value="{{ old('country_name') }}" required>
                    @error('country_name')
                        <p class="text-error">
                            {{ $message }}
                        </p>
                    @enderror
                </fieldset>
                <fieldset class="fieldset">
                    <label for="country_code" class="fieldset-label">
                        Código
                    </label>
                    <input type="text" class="input" name="country_code"
                        placeholder="Ingresa el código (3 letras) del pais" value="{{ old('country_code') }}" required>
                    @error('country_code')
                        <p class="text-error">
                            {{ $message }}
                        </p>
                    @enderror
                </fieldset>
                <fieldset class="fieldset pt-5">
                    <button class="btn btn-primary">Subir cambios</button>
                </fieldset>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop bg-black/20">
            <button>Cerrar</button>
        </form>
    </dialog>

    @foreach ($countries as $country)
        <dialog class="modal" id="edit-{{ $country['country_id'] }}">
            <div class="modal-box">
                <h1 class="text-xl font-bold mb-4">Editar país</h1>
                <form action="/countries/{{ $country['country_id'] }}" method="POST">
                    @csrf
                    @method('put')
                    <fieldset class="fieldset">
                        <label for="country_name" class="fieldset-label">
                            Nombre
                        </label>
                        <input type="text" class="input" name="country_name" placeholder="Ingresa el nombre del pais"
                            value={{ $country['country_name'] }}>
                        @error('country_name')
                            <p class="text-error">
                                {{ $message }}
                            </p>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset">
                        <label for="country_code" class="fieldset-label">
                            Código
                        </label>
                        <input type="text" class="input" name="country_code"
                            placeholder="Ingresa el código (3 letras) del pais" value={{ $country['country_code'] }}>
                        @error('country_code')
                            <p class="text-error">
                                {{ $message }}
                            </p>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset pt-5">
                        <button class="btn btn-primary">Subir cambios</button>
                    </fieldset>
                </form>
            </div>
            <form method="dialog" class="modal-backdrop bg-black/20">
                <button>Cerrar</button>
            </form>
        </dialog>
    @endforeach

@endsection
