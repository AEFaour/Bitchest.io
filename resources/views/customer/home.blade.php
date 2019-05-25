@extends('layouts.app')

@section('content')

<!--     liste Cryptos   --> 

  @include('layouts.errors')
  <h1 class="page-header">Dashbord du client</h1>



  <h2 class="sub-header">La liste des Cryptos monnaies <span class="solde">Mon solde: <strong>{{$customer_wallets->euro_balance}}€</strong></span></h2>
  <div class="table-responsive table-info">
    <table class="table table-striped table-info">
      <thead>
      <tr>
        <th>#</th>
        <th>Le nom de la crypto monnaie</th>
        <th>La valeur actuelle de la crypto-monnaie</th>
        <th>Le taux actuel de la crypto-monnaie</th>
        <th>La Progression</th>
        

      </tr>
      </thead>
      <tbody>
      @foreach($cryptos as $key => $crypto)

        <tr>
          <td>#</td>
          <td>{{ $crypto->name}}</td>
          <td>{{ $spend_currencies[$crypto->id -1]->euro_valeur}}€</td>
          <td>{{ $crypto->charge }}</td>
          
        </tr>
      @endforeach
    </table>
  </div>
@endsection
