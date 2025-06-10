@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Trip Overzicht</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Regio</th>
                    <th>Titel</th>
                    <th>Startdatum</th>
                    <th>Duur (dagen)</th>
                    <th>Confirmed</th>
                    <th>Pending</th>
                    <th>Cancelled</th>
                    <th>Totale omzet (€)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trips as $trip)
                    @php
                        $confirmed = $trip->bookings->where('status', 'confirmed');
                        $pending = $trip->bookings->where('status', 'pending');
                        $cancelled = $trip->bookings->where('status', 'cancelled');
                        $omzet = $confirmed->sum(fn($b) => $b->number_of_people * $trip->price_per_person);
                    @endphp
                    <tr>
                        <td>{{ $trip->region }}</td>
                        <td>{{ $trip->title }}</td>
                        <td>{{ $trip->start_date }}</td>
                        <td>{{ $trip->duration_days }}</td>
                        <td class="text-success fw-bold">{{ $confirmed->count() }}</td>
                        <td class="text-warning">{{ $pending->count() }}</td>
                        <td class="text-danger">{{ $cancelled->count() }}</td>
                        <td class="fw-medium">€ {{ number_format($omzet, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
