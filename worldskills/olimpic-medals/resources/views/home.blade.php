@extends('layouts.app')

@section('title', 'Listado de medallas')

@section('content')
    <section class="w-full px-5">
        <div class="w-full max-w-[1200px] mx-auto py-10 space-y-8">
            <h1 class="text-4xl font-extrabold">Historial de medallas olímpicas de cada país</h1>
            <div class="join join-vertical bg-base-100 w-full">
                @foreach ($countries as $country)
                    <div class="collapse collapse-arrow join-item border-base-300 border">
                        <input type="checkbox" name="item-{{ $country['country_id'] }}" />
                        <div class="collapse-title font-semibold capitalize">{{ $country['country_name'] }}
                            ({{ $country['country_code'] }})</div>
                        <ul class="collapse-content">
                            @forelse ($country['medals'] as $medal)
                                <li>
                                    <span>
                                        @if ($medal['medal_type'] === 'gold')
                                            🥇 Oro
                                        @elseif($medal['medal_type'] === 'silver')
                                            🥈 Plata
                                        @elseif($medal['medal_type'] === 'bronze')
                                            🥉 Bronce
                                        @endif
                                    </span> -
                                    <span class="font-semibold"> {{ $medal['medal_sport'] }} </span>
                                    ({{ $medal['medal_year'] }})
                                    <ul class="ml-6 mt-1 text-sm text-base-content/50">
                                        @forelse ($medal['competitors'] as $competitor)
                                            <li>
                                                {{ $competitor['competitor_name'] }} {{ $competitor['competitor_lastname'] }}
                                            </li>
                                        @empty
                                            <li>No hay competidores registrados para esta medalla.</li>
                                        @endforelse
                                    </ul>
                                </li>
                            @empty
                                <li>
                                    No cuenta con medallas registradas aún...
                                </li>
                            @endforelse
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
