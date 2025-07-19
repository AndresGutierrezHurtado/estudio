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
                        <div class="collapse-title font-semibold capitalize">{{ $country['country_name'] }}</div>
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
                                    </span>
                                    {{ $medal['medal_sport'] }} {{ $medal['medal_year'] }}
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
