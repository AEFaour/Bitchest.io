@extends ('layouts.app')



<!--  The liste of customer--> 



@section('content')

    <h2>La liste des Clients</h2>

    <hr>

    <table class="table table-striped">
  <thead class="thead-light">
    <tr>
      <th scope="col">Le nom</th>
      <th scope="col">Le role</th>
      <th scope="col">L'action</th>
      
    </tr>
  </thead>

  <tbody>
    @foreach($allusers as $customer)
    <tr>
        <th scope="col">{{$customer->name}}</th>
        <th scope="col">{{$customer->role}}</th>
        <th scope="col">
            <a href="customers/{{$customer->id}}/detail" class="btn btn-danger">Voir</a>
            <a href="customers/{{$customer->id}}/modify" class="btn btn-danger2">Modifier</a>
            <a href="customers/{{$customer->id}}/delete" class="btn btn-danger3">Supprimer</a>
        </th>
    </tr>
    @endforeach
  </tbody>
  <tfooter>
    <tr>
      <th scope="col"><a href="customers/create" class="btn btn-success">Ajouter un client</a></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </tfooter>
</table>
@endsection