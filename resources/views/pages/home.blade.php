@extends('layout.app')

@section('title', 'Home')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="mb-4">
            <h1 class="display-4 mb-0">Orari Treni</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Compagnia</th>
                        <th>Codice Treno</th>
                        <th>Partenza</th>
                        <th>Arrivo</th>
                        <th>Orario Partenza</th>
                        <th>Orario Arrivo</th>
                        <th>Stato</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($trains as $train)
                    <tr>
                        <td>{{ $train->company }}</td>
                        <td>{{ $train->train_code }}</td>
                        <td>{{ $train->departure_station }}</td>
                        <td>{{ $train->arrival_station }}</td>
                        <td>{{ \Carbon\Carbon::parse($train->departure_time)->format('H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($train->arrival_time)->format('H:i') }}</td>
                        <td>
                            @if($train->suspended)
                                <span class="badge bg-danger">Cancellato</span>
                            @elseif(!$train->on_time)
                                <span class="badge bg-warning text-dark">In Ritardo</span>
                            @else
                                <span class="badge bg-success">In Orario</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Nessun treno disponibile</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
