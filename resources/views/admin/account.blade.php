@extends('layouts.app')

@section('content')


<!--  About the count of the admin -->

<h1>Mon compte</h1>

<hr>

<form action="account/update/{{$currentUser->id}}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <div class="form-group">
        <label for="name">Le nom:</label>
        <input type="text" class="form-control" name="name" value="{{$currentUser->name}}">
    </div>

    <div class="form-group">
        <label for="email">L'email:</label>
        <input type="text" class="form-control" name="email" value="{{$currentUser->email}}">
    </div>

    <div class="form-group">
        <label for="password">Le password:</label>
        <input type="password" class="form-control" name="password" value="{{$currentUser->password}}::hach">
    </div>

    <div class="form-group">
        <label for="password">Le role:</label>
       
        <select class="form-control" name="role">
          
            @foreach($roles as $index => $role)
            <option value="{{$role}}" name="role">{{ $role }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
    <!-- Update the informations-->
        <button class="btn btn-primary">Mettre à jour</button>
    </div>
</form>

@endsection