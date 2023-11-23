@extends("layouts.main")

@section("content")

    <h1 class="text-light text-center my-5">Stazione - Partenze e Arrivi</h1>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Compagnia</th>
                    <th scope="col">Stazione di Partenza</th>
                    <th scope="col">Orario di Partenza</th>
                    <th scope="col">Stazione di Arrivo</th>
                    <th scope="col">Orario di Arrivo</th>
                    <th scope="col">Codice</th>
                    <th scope="col">In Orario</th>
                    <th scope="col">Cancellato</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($trains as $train)
                <tr>
                        <td>{{ $train->company }}</td>
                        <td>{{ $train->departure_station }}</td>
                        <td>{{ $train->departure_time }}</td>
                        <td>{{ $train->arrival_station }}</td>
                        <td>{{ $train->arrival_time }}</td>
                        <td>{{ $train->code }}</td>
                        @if (($train->in_time) == 1)
                            <td>Sì</td>
                        @else
                            <td>No</td>
                        @endif

                        @if (($train->is_cancelled) == 1)
                            <td>Sì</td>
                        @else
                            <td>No</td>
                        @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
