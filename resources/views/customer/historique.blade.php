@extends('layouts.app')

@section('content')

<!--    Historical  -->

    @include('layouts.errors')

    <h1 class="page-header">L'historique du Client</h1>


    <h2 class="sub-header">La liste des transactions<span class="solde">Mon solde: <strong>{{$customer_wallet->euro_balance}}€</strong></span></h2>
    <div class="table-responsive">
    
            <table class="table table-striped">
                <thead>
                <tr>
                    
                    <th>Le nom de la crypto-monnaie</th>
                    <th>La quantité</th>
                    <th>La valeur initiale de la crypto monnaie</th>
                    <th>La valeur du lot</th>
                    <th>La date de la transaction</th>
                    <th>Le statut transaction</th>
      
    
                </tr>
                </thead>
                <tbody>
                
                @foreach($spend_currencies as $spend_currencies)
    
                    <tr>
                    
                        <td>{{ $spend_currencies->name}}</td>
                        <td>{{ $spend_currencies->quantity}}</td>
                        <td>{{ $spend_currencies->valeur}}€</td>
                        <td>{{ $spend_currencies->euro_valeur}}</td>
                        <td>{{ $spend_currencies->purchase_date}}</td>
                        <td>@if($spend_currencies->active)
                                {{$status[1]}}
                            @else
                                {{$status[0]}}
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        <h2 class="sub-header">La liste des achats</h2>
            <div class="table-responsive">
    
            <table class="table table-striped">
                <thead>
                <tr>
                    
                    <th>Le nom de la crypto monnaie</th>
                    <th>La quantité</th>
                    <th>Le valeur initiale de la monnaie</th>
                    <th>Le valeur du lot</th>
                    <th>La date de la transaction</th>
                    <th>Le statut transaction</th>
    
                    
    
                </tr>
                </thead>
                <tbody>

                @foreach($purchases as $purchase)
    
                    <tr>
                    
                        <td>{{ $purchase->name}}</td>
                        <td>{{ $purchase->quantity}}</td>
                        <td>{{ $purchase->valeur}}€</td>
                        <td>{{ $purchase->euro_valeur }}</td>
                        <td>{{ $purchase->purchase_date}}</td>
                        <td>@if($purchase->active)
                                {{$status[1]}}
                            @else
                                {{$status[0]}}
                            @endif
                        </td>
                    </tr>
                @endforeach

                
                </tbody>
            </table>
        </div>

        <h2 class="sub-header">La liste des ventes</h2>
            <div class="table-responsive">
    
            <table class="table table-striped">
                <thead>
                <tr>
                    
                    <th>Le nom de la crypto monnaie</th>
                    <th>La quantité</th>
                    <th>La valeur initiale de la monnaie</th>
                    <th>La valeur du lot</th>
                    <th>La date de la transaction</th>
                    <th>Le statut transaction</th>
    
                    
    
                </tr>
                </thead>
                <tbody>

                @foreach($purchases as $purchase)
    
                    <tr>
    
                        <td>{{ $purchase->name}}</td>
                        <td>{{ $purchase->quantity}}</td>
                        <td>{{ $purchase->valeur}}€</td>
                        <td>{{ $purchase->euro_valeur }}</td>
                        <td>{{ $purchase->purchase_date}}</td>
                        <td>@if($purchase->active)
                                {{$status[1]}}
                            @else
                                {{$status[0]}}
                            @endif
                        </td>
                    </tr>
                @endforeach

                
                </tbody>
            </table>
        </div>

@endsection