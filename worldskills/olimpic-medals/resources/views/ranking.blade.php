@extends('layouts.app')

@section('title', 'Ranking de Países')

@section('content')
<section class="w-full px-5">
    <div class="w-full max-w-[1200px] mx-auto py-10 space-y-8">
        <h1 class="text-4xl font-extrabold">Ranking de Países</h1>
        <div class="w-full bg-base-200 rounded border-base-300">
            <table class="table">
                <thead>
                    <tr>
                        <th>Posición</th>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Oro 🥇</th>
                        <th>Plata 🥈</th>
                        <th>Bronce 🥉</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($countries as $i => $country)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $country->country_code }}</td>
                            <td class="capitalize">{{ $country->country_name }}</td>
                            <td>{{ $country->gold_medals }}</td>
                            <td>{{ $country->silver_medals }}</td>
                            <td>{{ $country->bronze_medals }}</td>
                            <td>{{ $country->total_medals }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <p class="text-center text-lg">No hay datos de países...</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection 