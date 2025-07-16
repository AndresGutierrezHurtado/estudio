@extends('layouts.app')

@section('title', 'Gestión de paises y sus medallas olímpicas')

@section('content')
    <section class="w-full px-5">
        <div class="w-full max-w-[1200px] mx-auto py-10 space-y-8">
            <h1 class="text-4xl font-extrabold">Gestión de paises</h1>
            <div class="w-full">
                {{-- Filters --}}
                <div class="w-full flex justify-between items-center">
                    <form action="" method="get">
                        <label for="seach" class="input">
                            <input type="text" name="search" id="search" placeholder="Buscar país">
                        </label>
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
                                            <button class="btn btn-primary">
                                                Editar
                                            </button>
                                            <button class="btn btn-outline">
                                                Eliminar
                                            </button>
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
@endsection
