@extends('layouts.app')

@section('content')



@include('layouts.errors')
    <h1 class="page-header">Dashboard CLIENT</h1>

    

    <h2 class="sub-header">Cryptos monnaies <span class="solde">Mon solde: <strong>{{$customer_wallets->euro_balance}}€</strong></span></h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Le nom de la crypto monnaie</th>
                <th>La valeur actuelle de la crypto-monnaie</th>
                <th>Le taux actuel de la crypto-monnaie</th>
                <th>La Progression</th>
                <th>L'action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($cryptos as $key => $crypto)

                    <tr>
                    <td>#</td>
                    <td>{{ $crypto->name}}</td>
                    <td>{{ $spend_currencies[$crypto->id -1]->euro_valeur}}€</td>
                    <td>{{ $crypto->charge }}</td>
                   
                    <td>
                 

                        <a href="chart/buy/{{$crypto->id}}" class="btn btn-success">Acheter</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
