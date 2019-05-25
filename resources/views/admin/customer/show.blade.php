@extends('layouts.app')

<!-- Display the count of the admin -->

@section('content')
    <h2>Détail sur le compte du client</h2>
    <hr>
    
    <div class="account">
        <h3>Informations générales sur le client</h3>
        {{--{{ dump($user) }}--}}
        <ul>
            <li>
                <strong>Le nom:</strong>{{ $user[0]->name }}
            </li>

            <li>
                <strong>L'email:</strong>{{ $user[0]->email }}
            </li>
            
            <li>
                <strong>Le role:</strong>{{ $user[0]->role }}
            </li>
        </ul>

        <hr>

        @if( $user[0]->role == 'Customer' )
        <h3>Détail  du portefeuille de client</h3>
        {{--{{dump($customer_wallets)}}--}}
        @endif
       
    </div>

    <form action="/customers/create" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Le nom:</label>
        <input type="text" class="form-control" name="name" value="">
    </div>

    <div class="form-group">
        <label for="email">L'Email:</label>
        <input type="text" class="form-control" name="email" value="">
    </div>

    <div class="form-group">
        <label for="password">Le password:</label>
        <input type="password" class="form-control" name="password" value="">
    </div>

    <div class="form-group">
        <label for="password">Le Role:</label>
       
        <select class="form-control" name="role">
          
            @foreach($roles as $index => $role)
            <option value="{{$role}}" name="role">{{ $role }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Enregister">
    </form>
@endsection