@extends('layouts.app')

@section('title', 'Gestión de competidores')

@section('content')
    <section class="w-full px-5">
        <div class="w-full max-w-[1200px] mx-auto py-10 space-y-8">
            <h1 class="text-4xl font-extrabold">Gestión de competidores</h1>
            {{-- error alert daisyui --}}
            @if (session('error'))
                <div class="alert alert-error text-error-content">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <div class="w-full space-y-5">
                {{-- Filters --}}
                <div class="w-full flex justify-between items-center">
                    <form action="" method="get" class="w-full max-w-sm">
                        <fieldset class="w-full fieldset flex flex-row">
                            <label for="search-input" class="input">
                                <input type="text" name="search" id="search-input" placeholder="Buscar competidor"
                                    value="{{ request('search') }}">
                                <div class="flex gap-2 items-center text-xs">
                                    <kbd class="kbd kbd-xs">Alt</kbd>
                                    <span>+</span>
                                    <kbd class="kbd kbd-xs">S</kbd>
                                </div>
                            </label>
                            <button class="btn">Buscar</button>
                            @if (request('search'))
                                <a href="/competitors" type="reset" class="btn">Reiniciar</a>
                            @endif
                        </fieldset>
                    </form>
                    <button class="btn btn-primary" onclick="document.getElementById('create').show()">Agregar
                        Competidor</button>
                </div>

                {{-- Table --}}
                <div class="w-full bg-base-200 rounded border-base-300">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>País</th>
                                <th>Fecha de nacimiento</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($competitors as $competitor)
                                <tr>
                                    <td>{{ $competitor['competitor_name'] }}</td>
                                    <td>{{ $competitor['competitor_lastname'] }}</td>
                                    <td class="capitalize">{{ $competitor['country']['country_name'] ?? '' }}</td>
                                    <td>{{ $competitor['competitor_birthdate'] }}</td>
                                    <td>{{ $competitor['competitor_description'] }}</td>
                                    <td>
                                        <div class="w-fit flex flex-wrap gap-2 items-center justify-center">
                                            <button
                                                onclick="document.getElementById('edit-{{ $competitor['competitor_id'] }}').show()"
                                                class="btn btn-primary">
                                                Editar
                                            </button>
                                            <form action="/competitors/{{ $competitor['competitor_id'] }}" method="post"
                                                onsubmit="return confirm('¿Estás seguro que quieres eliminar el competidor? Esta acción es irrevertible');">
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
                                    <td colspan="6">
                                        <p class="text-center text-lg">No se encontraron resultados...</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="mt-2">
                    {{ $competitors->links('layouts.pagination') }}
                </div>
            </div>
        </div>
    </section>

    <dialog class="modal" id="create">
        <div class="modal-box">
            <h1 class="text-xl font-bold mb-4">Crear competidor</h1>
            <form action="/competitors" method="POST">
                @csrf
                <fieldset class="fieldset">
                    <label for="competitor_name" class="fieldset-label">Nombre</label>
                    <input type="text" class="input" name="competitor_name" placeholder="Nombre"
                        value="{{ old('competitor_name') }}" required>
                    @error('competitor_name')
                        <p class="text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                <fieldset class="fieldset">
                    <label for="competitor_lastname" class="fieldset-label">Apellido</label>
                    <input type="text" class="input" name="competitor_lastname" placeholder="Apellido"
                        value="{{ old('competitor_lastname') }}" required>
                    @error('competitor_lastname')
                        <p class="text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                <fieldset class="fieldset">
                    <label for="country_id" class="fieldset-label">País</label>
                    <select name="country_id" id="country_id" class="select" required>
                        <option value="" disabled selected>Selecciona el país</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country['country_id'] }}" class="capitalize"
                                @if (old('country_id') == $country['country_id']) selected @endif>
                                {{ $country['country_name'] }}
                            </option>
                        @endforeach
                    </select>
                    @error('country_id')
                        <p class="text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                <fieldset class="fieldset">
                    <label for="competitor_birthdate" class="fieldset-label">Fecha de nacimiento</label>
                    <input type="date" class="input" name="competitor_birthdate"
                        value="{{ old('competitor_birthdate') }}" required>
                    @error('competitor_birthdate')
                        <p class="text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                <fieldset class="fieldset">
                    <label for="competitor_description" class="fieldset-label">Descripción</label>
                    <textarea class="input" name="competitor_description" placeholder="Descripción" required>{{ old('competitor_description') }}</textarea>
                    @error('competitor_description')
                        <p class="text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                <fieldset class="fieldset pt-5">
                    <button class="btn btn-primary">Crear competidor</button>
                </fieldset>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop bg-black/20">
            <button>Cerrar</button>
        </form>
    </dialog>

    @foreach ($competitors as $competitor)
        <dialog class="modal" id="edit-{{ $competitor['competitor_id'] }}">
            <div class="modal-box">
                <h1 class="text-xl font-bold mb-4">Editar competidor</h1>
                <form action="/competitors/{{ $competitor['competitor_id'] }}" method="POST">
                    @csrf
                    @method('put')
                    <fieldset class="fieldset">
                        <label for="competitor_name" class="fieldset-label">Nombre</label>
                        <input type="text" class="input" name="competitor_name"
                            value="{{ $competitor['competitor_name'] }}">
                        @error('competitor_name')
                            <p class="text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset">
                        <label for="competitor_lastname" class="fieldset-label">Apellido</label>
                        <input type="text" class="input" name="competitor_lastname"
                            value="{{ $competitor['competitor_lastname'] }}">
                        @error('competitor_lastname')
                            <p class="text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset">
                        <label for="country_id" class="fieldset-label">País</label>
                        <select name="country_id" id="country_id" class="select" required>
                            <option value="" disabled selected>Selecciona el país</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country['country_id'] }}" class="capitalize"
                                    @if ($competitor['country_id'] == $country['country_id']) selected @endif>
                                    {{ $country['country_name'] }}
                                </option>
                            @endforeach
                        </select>
                        @error('country_id')
                            <p class="text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset">
                        <label for="competitor_birthdate" class="fieldset-label">Fecha de nacimiento</label>
                        <input type="date" class="input" name="competitor_birthdate"
                            value="{{ $competitor['competitor_birthdate'] }}">
                        @error('competitor_birthdate')
                            <p class="text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset">
                        <label for="competitor_description" class="fieldset-label">Descripción</label>
                        <textarea class="input" name="competitor_description">{{ $competitor['competitor_description'] }}</textarea>
                        @error('competitor_description')
                            <p class="text-error">{{ $message }}</p>
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
