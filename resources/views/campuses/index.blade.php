@extends('layouts.app')
@section('content')





          <div class="row">
              <div class="col-lg-12 margin-tb">
                  <div class="pull-left">
                      <h2>campuses</h2>
                  </div>
                  <div class="pull-right">
                      @can('isAdmin')
                      <a class="btn btn-success"  style="float:right" href="/campuses/create"> add campus</a>
                      @endcan
                  </div>
              </div>
          </div>
      
      
          
      
          <table class="table table-bordered">
              <tr>
                  <th>No</th>
                  <th width="300">campus</th>
                  <th width="300">university</th>
                  
                  <th width="300px">Action</th>
              </tr>
          @foreach ($camp as $u)
          <tr >
              <td>{{ ++$i }}</td>
              <td>{{ $u->name}}</td>
          <td>{{$u->university->name}}</td>
              
              <td>
            {!! Form::open(['action'=>[ 'CampusController@destroy',$u->id], 'method'=>'POST'])!!}
                    @method('DELETE')
                  <a class="bt btn-sm btn btn-info" href="/campuses/{{$u->id}}">Show</a>
                 @can('isAdmin')
                     
                 
                
                  <a class=" btn btn-sm btn btn-primary" href="/campuses/{{$u->id}}/edit">Edit</a>
                
                
                 
                
                  {!! Form::submit('Delete', ['class' => ' btn btn-sm btn btn-danger']) !!}
                  @endcan
                  {!! Form::close() !!}
                  
              </td>
          </tr>
          @endforeach
        </table>
      
      {{ $camp->links() }}
 

    
        @endsection