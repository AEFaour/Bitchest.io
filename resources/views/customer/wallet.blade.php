@extends('layouts.app')

@section('content')


<!-- Wallet -->
    
    <h1 class="page-header">Dashboard CLIENT</h1>

    @include('layouts.errors')

    <h2 class="sub-header">Le portefeuille <span class="solde">Mon solde: <strong>{{$customer_wallet->euro_balance}}€</strong></span></h2>
    <div class="table-responsive">

        <table class="table table-striped">
            <thead>
            <tr>
                
                <th>Nom de la crypto monnaie</th>
                <th>Quantité</th>
                <th>Valeur initiale de la crypto monnaie</th>
                <th>Valeur du lot</th>

                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            
            @foreach($spend_currencies as $spend_currencies)

                <tr>
                
                    <td>{{ $spend_currencies->name}}</td>
                    <td>{{ $spend_currencies->quantity}}</td>
                    <td>{{ $spend_currencies->valeur}}€</td>
                    <td>{{ $spend_currencies->euro_valeur}}</td>
                    <td>
                        <a href="/wallet/sell/{{$spend_currencies->id}}" type="button" class="btn btn-danger">vendre</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
