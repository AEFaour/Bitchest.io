@extends('layouts.app')

@section('content')
<!-- About the Dashboard 
of the costumer count  -->

  @include('layouts.errors')

  <h1 class="page-header">Dashbord d'Admin</h1>
  <h2>La liste des Clients</h2>

  <hr>

  <table class="table table-striped table-info">
    <thead class="thead-light">
    <tr>
      <th scope="col">Le nom</th>
      <th scope="col">Le role</th>

    </tr>
    </thead>

    <tbody>
    @foreach($allusers as $customer)
      <tr>
        <th scope="col">{{$customer->name}}</th>
        <th scope="col">{{$customer->role}}</th>
      </tr>
    @endforeach
    </tbody>
  </table>

  <h2 class="sub-header">Les Cryptos monnaies</h2>
  <div class="table-responsive table-info">
    <table class="table table-striped table-info">
      <thead>
      <tr>
        <th>#</th>
        <th>Le nom de la crypto monnaie</th>
        <th>La valeur actuelle de la crypto monnaie</th>
        <th>Le taux actuel de la crypto monnaie</th>

      </tr>
      </thead>
      <tbody>
      @foreach($cryptos as $crypto)

        <tr>
          <td>#</td>
          <td>{{ $crypto->name}}</td>
          <td>{{ $spend_currencies}}€</td>
          <td>{{ $crypto->getCoursActuel()}}</td>

        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
@endsection