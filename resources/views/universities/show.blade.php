@extends('layouts.app')
@section('content')
<div class="card" style="width: 30rem;">
    <div class="card-header">
      <h3>university information</h3>
    </div>
    
    
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><h4>{{$uni->name}}</h4></li>
      <li class="list-group-item"><h4>{{$uni->telephone}}</h4></li>
      <li class="list-group-item"><h4>{{$uni->email}}</h4></li>
      <li class="list-group-item"><h4>{{$uni->physical_address}}</h4></li>
      <li class="list-group-item"><h4>{{$uni->organization_type->name}}</h4></li>

    </ul>
    <a href="/uni/{{$uni->id}}/edit" class="btn btn-secondary"> Edit </a>
  </div>
          
              
          


@endsection