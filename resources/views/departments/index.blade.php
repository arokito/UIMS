@extends('layouts.app')
@section('content')





          <div class="row">
              <div class="col-lg-12 margin-tb">
                  <div class="pull-left">
                      <h2>departments</h2>
                  </div>
                  <div class="pull-right">
                      @can('isAdmin')
                      <a class="btn btn-success"  style="float:right" href="/departments/create"> add department</a>
                      @endcan
                  </div>
              </div>
          </div>
      
      
          
      
          <table class="table table-bordered">
              <tr>
                  <th>No</th>
                  <th width="300">department</th>
                  <th width ="300">fuculty</th>
                  
                  <th width="300px">Action</th>
              </tr>
          @foreach ($dep as $u)
          <tr >
              <td>{{ ++$i }}</td>
              <td>{{ $u->name}}</td>
          <td>{{$u->fuculty->name}}</td>
              
              <td>
            {!! Form::open(['action'=>[ 'DepartmentController@destroy',$u->id], 'method'=>'POST'])!!}
                    @method('DELETE')
                  <a class="bt btn-sm btn btn-info" href="/departments/{{$u->id}}">Show</a>
              
                @can('isAdmin')
                  <a class=" btn btn-sm btn btn-primary" href="/departments/{{$u->id}}/edit">Edit</a>
                
                
                 
                
                  {!! Form::submit('Delete', ['class' => ' btn btn-sm btn btn-danger']) !!}
                  @endcan
                  {!! Form::close() !!}
                  
              </td>
          </tr>
          @endforeach
        </table>
      
      {{ $dep->links() }}
 

        @endsection