@extends('layouts.app')

@section('title', 'Gestión de medallas')

@section('content')
    <section class="w-full px-5">
        <div class="w-full max-w-[1200px] mx-auto py-10 space-y-8">
            <h1 class="text-4xl font-extrabold">Gestión de medallas</h1>
            <div class="w-full space-y-5">
                {{-- Filters --}}
                <div class="w-full flex justify-between items-center">
                    <form action="" method="get" class="w-full max-w-sm">
                        <fieldset class="w-full fieldset flex flex-row">
                            <label for="search-input" class="input">
                                <input type="text" name="search" id="search-input" placeholder="Buscar país"
                                    value="{{ request('search') }}">
                                <div class="flex gap-2 items-center text-xs">
                                    <kbd class="kbd kbd-xs">Alt</kbd>
                                    <span>+</span>
                                    <kbd class="kbd kbd-xs">S</kbd>
                                </div>
                            </label>
                            <button class="btn">Buscar</button>
                            @if (request('search'))
                                <a href="/medals" type="reset" class="btn">Reiniciar</a>
                            @endif
                        </fieldset>
                    </form>
                    <button class="btn btn-primary" onclick="document.getElementById('create').show()">Agregar
                        Medalla</button>
                </div>

                {{-- Table --}}
                <div class="w-full bg-base-200 rounded border-base-300">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Tipo</th>
                                <th>Deporte</th>
                                <th>Competidores</th>
                                <th>Pais</th>
                                <th>Año</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($medals as $medal)
                                <tr>
                                    <td> {{ $medal['medal_id'] }} </td>
                                    <td>
                                        @if ($medal['medal_type'] === 'gold')
                                            🥇 Oro
                                        @elseif($medal['medal_type'] === 'silver')
                                            🥈 Plata
                                        @elseif($medal['medal_type'] === 'bronze')
                                            🥉 Bronce
                                        @endif
                                    </td>
                                    <td> {{ $medal['medal_sport'] }} </td>
                                    <td>
                                        @foreach ($medal['competitors'] as $competitor)
                                            <p>
                                                {{ $competitor['competitor_name'] }}
                                                {{ $competitor['competitor_lastname'] }}
                                            </p>
                                        @endforeach
                                    </td>
                                    <td class="capitalize"> {{ $medal['country']['country_name'] }} </td>
                                    <td> {{ $medal['medal_year'] }} </td>
                                    <td>
                                        <div class="w-fit flex flex-wrap gap-2 items-center justify-center">
                                            <button
                                                onclick="document.getElementById('edit-{{ $medal['medal_id'] }}').show()"
                                                class="btn btn-primary">
                                                Editar
                                            </button>
                                            <form action="/medals/{{ $medal['medal_id'] }}" method="post"
                                                onsubmit="return confirm('¿Estás seguro que quieres eliminar esta medalla? Esta acción es irrevertible');">
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
                    {{ $medals->links('layouts.pagination') }}
                </div>
            </div>
        </div>
    </section>

    <dialog class="modal" id="create">
        <div class="modal-box">
            <h1 class="text-xl font-bold mb-4">Crear medalla</h1>
            <form action="/medals" method="POST">
                @csrf
                <fieldset class="fieldset">
                    <label for="medal_type" class="fieldset-label text-base after:content-['*'] after:text-error">
                        Tipo de medalla:
                    </label>
                    <select name="medal_type" id="medal_type" class="select" required>
                        <option value="" disabled selected>Selecciona el tipo de medalla</option>
                        <option value="gold">Oro</option>
                        <option value="silver">Plata</option>
                        <option value="bronze">Bronce</option>
                    </select>
                    @error('medal_type')
                        <p class="text-error">
                            {{ $message }}
                        </p>
                    @enderror
                </fieldset>
                <fieldset class="fieldset">
                    <label for="medal_sport" class="fieldset-label text-base after:content-['*'] after:text-error">
                        Deporte:
                    </label>
                    <input type="text" name="medal_sport" id="medal_sport"
                        placeholder="Ingresa el deporte de esta medalla" class="input" value="{{ old('medal_sport') }}">
                    @error('medal_sport')
                        <p class="text-error">
                            {{ $message }}
                        </p>
                    @enderror
                </fieldset>
                <fieldset class="fieldset">
                    <label for="country_id" class="fieldset-label text-base after:content-['*'] after:text-error">
                        País de la medalla:
                    </label>
                    <select name="country_id" id="country_id" class="select" required>
                        <option value="" disabled selected>Selecciona el pais de la medalla</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country['country_id'] }}" class="capitalize">
                                {{ $country['country_name'] }}
                            </option>
                        @endforeach
                    </select>
                    @error('country_id')
                        <p class="text-error">
                            {{ $message }}
                        </p>
                    @enderror
                </fieldset>
                <fieldset class="fieldset">
                    <label for="medal_year" class="fieldset-label text-base after:content-['*'] after:text-error">
                        Año:
                    </label>
                    <input type="number" name="medal_year" id="medal_year" placeholder="Ingresa el deporte de esta medalla"
                        class="input" value="{{ old('medal_year', 2025) }}">
                    @error('medal_year')
                        <p class="text-error">
                            {{ $message }}
                        </p>
                    @enderror
                </fieldset>
                <fieldset class="fieldset">
                    <label for="competitor_ids" class="fieldset-label text-base after:content-['*'] after:text-error">
                        Competidores:
                    </label>
                    <select name="competitor_ids[]" id="competitor_ids" class="input h-20" multiple required>
                        @foreach ($competitors as $competitor)
                            <option value="{{ $competitor['competitor_id'] }}"
                                @if (isset($medal) &&
                                        isset($medal['competitors']) &&
                                        in_array($competitor['competitor_id'], array_column($medal['competitors']->toArray(), 'competitor_id'))) selected @endif>
                                {{ $competitor['competitor_name'] }} {{ $competitor['competitor_lastname'] }}
                            </option>
                        @endforeach
                    </select>
                    @error('competitor_ids')
                        <p class="text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                <fieldset class="fieldset pt-5">
                    <button class="btn btn-primary">Crear medalla</button>
                </fieldset>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop bg-black/20">
            <button>Cerrar</button>
        </form>
    </dialog>

    @foreach ($medals as $medal)
        <dialog class="modal" id="edit-{{ $medal['medal_id'] }}">
            <div class="modal-box">
                <h1 class="text-xl font-bold mb-4">Editar país</h1>
                <form action="/medals/{{ $medal['medal_id'] }}" method="POST">
                    @csrf
                    @method('put')
                    <fieldset class="fieldset">
                        <label for="medal_type" class="fieldset-label text-base after:content-['*'] after:text-error">
                            Tipo de medalla:
                        </label>
                        <select name="medal_type" id="medal_type" class="select" required>
                            <option value="" disabled selected>Selecciona el tipo de medalla</option>
                            <option value="gold" @if ($medal['medal_type'] === 'gold') selected @endif>Oro</option>
                            <option value="silver" @if ($medal['medal_type'] === 'silver') selected @endif>Plata</option>
                            <option value="bronze" @if ($medal['medal_type'] === 'bronze') selected @endif>Bronce</option>
                        </select>
                        @error('medal_type')
                            <p class="text-error">
                                {{ $message }}
                            </p>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset">
                        <label for="medal_type" class="fieldset-label text-base after:content-['*'] after:text-error">
                            Deporte:
                        </label>
                        <input type="text" name="medal_sport" id="medal_sport"
                            placeholder="Ingresa el deporte de esta medalla" class="input"
                            value="{{ $medal['medal_sport'] }}">
                        @error('medal_sport')
                            <p class="text-error">
                                {{ $message }}
                            </p>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset">
                        <label for="medal_type" class="fieldset-label text-base after:content-['*'] after:text-error">
                            País de la medalla:
                        </label>
                        <select name="country_id" id="country_id" class="select" required>
                            <option value="" disabled selected>Selecciona el pais de la medalla</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country['country_id'] }}" class="capitalize"
                                    @if ($medal['country_id'] === $country['country_id']) selected @endif>
                                    {{ $country['country_name'] }}
                                </option>
                            @endforeach
                        </select>
                        @error('country_id')
                            <p class="text-error">
                                {{ $message }}
                            </p>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset">
                        <label for="medal_year" class="fieldset-label text-base after:content-['*'] after:text-error">
                            Año:
                        </label>
                        <input type="number" name="medal_year" id="medal_year"
                            placeholder="Ingresa el deporte de esta medalla" class="input"
                            value="{{ $medal['medal_year'] }}">
                        @error('medal_year')
                            <p class="text-error">
                                {{ $message }}
                            </p>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset">
                        <label for="competitor_ids" class="fieldset-label text-base after:content-['*'] after:text-error">
                            Competidores:
                        </label>
                        <select name="competitor_ids[]" id="competitor_ids" class="select" multiple required>
                            @foreach ($competitors as $competitor)
                                <option value="{{ $competitor['competitor_id'] }}"
                                    @if (isset($medal) &&
                                            isset($medal['competitors']) &&
                                            in_array($competitor['competitor_id'], array_column($medal['competitors']->toArray(), 'competitor_id'))) selected @endif>
                                    {{ $competitor['competitor_name'] }} {{ $competitor['competitor_lastname'] }}
                                </option>
                            @endforeach
                        </select>
                        @error('competitor_ids')
                            <p class="text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset pt-5">
                        <button class="btn btn-primary">Subir cambios</button>
                    </fieldset>
                </form>
            </div>
            <form method="dialog" class="modal-backdrop bg-black/20"><button>Cerrar</button></form>
        </dialog>
    @endforeach
@endsection
