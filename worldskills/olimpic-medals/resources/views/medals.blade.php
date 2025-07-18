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
                            <label for="seach" class="input">
                                <input type="text" name="search" id="search" placeholder="Buscar país"
                                    value="{{ request('search') }}">
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
@endsection