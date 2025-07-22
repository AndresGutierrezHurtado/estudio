@extends('layouts.app')

@section('title', 'Detalle de competidor')

@section('content')
<section class="w-full px-5">
    <div class="w-full max-w-[800px] mx-auto py-10 space-y-8">
        <h1 class="text-4xl font-extrabold mb-4">Detalle de competidor</h1>
        <div class="bg-base-200 rounded p-6 flex flex-col gap-4">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="flex-1">
                    <h2 class="text-2xl font-bold mb-2">{{ $competitor->competitor_name }} {{ $competitor->competitor_lastname }}</h2>
                    <p class="text-base-content/70 mb-1"><span class="font-semibold">País:</span> {{ $competitor->country->country_name ?? '-' }}</p>
                    <p class="text-base-content/70 mb-1"><span class="font-semibold">Fecha de nacimiento:</span> {{ $competitor->competitor_birthdate }}</p>
                    <p class="text-base-content/70 mb-1"><span class="font-semibold">Descripción:</span> {{ $competitor->competitor_description }}</p>
                </div>
            </div>
            <div>
                <h3 class="text-xl font-semibold mt-6 mb-2">Medallas obtenidas</h3>
                @if($competitor->medals->isEmpty())
                    <p class="text-base-content/60">Este competidor no tiene medallas registradas.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Deporte</th>
                                    <th>Año</th>
                                    <th>País</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($competitor->medals as $medal)
                                    <tr>
                                        <td>
                                            @if ($medal->medal_type === 'gold')
                                                🥇 Oro
                                            @elseif($medal->medal_type === 'silver')
                                                🥈 Plata
                                            @elseif($medal->medal_type === 'bronze')
                                                🥉 Bronce
                                            @endif
                                        </td>
                                        <td>{{ $medal->medal_sport }}</td>
                                        <td>{{ $medal->medal_year }}</td>
                                        <td>{{ $medal->country->country_name ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
            <div class="mt-6">
                <a href="/competitors" class="btn btn-outline">Volver a la lista</a>
            </div>
        </div>
    </div>
</section>
@endsection 