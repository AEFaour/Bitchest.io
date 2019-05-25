@extends('layouts.app')

@section('content')




    @include('layouts.errors')

    <h1 class="page-header">Dashboard ADMIN</h1>

    <h2 class="sub-header">Cryptos-monnaies </h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Le nom de la crypto-monnaie</th>
                <th>La valeur actuelle de la monnaie</th>
                <th>Le taux actuel de la monnaie</th>

            </tr>
            </thead>
            <tbody>
            @foreach($cryptos as $crypto)

                    <tr>
                    <td>#</td>
                    <td>{{ $crypto->name}}</td>
                    <td>{{ $spend_currencies[$crypto->id -1]->euro_valeur}}€</td>
                    <td>{{ $crypto->getCoursActuel()->charge }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
