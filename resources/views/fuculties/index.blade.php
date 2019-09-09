@extends('layouts.app')
@section('content')





          <div class="row">
              <div class="col-lg-12 margin-tb">
                  <div class="pull-left">
                      <h2>fuculties</h2>
                  </div>
                  <div class="pull-right">
                      @can('isAdmin')
                      <a class="btn btn-success"  style="float:right" href="/fuculties/create"> add fuculty</a>
                      @endcan
                  </div>
              </div>
          </div>
      
      
          
      
          <table class="table table-bordered">
              <tr>
                  <th>No</th>
                  <th width="300">fuculty</th>
                  
                  <th width="30px">campus</th>
                  <th width="380px">Action</th>
              </tr>
          @foreach ($fac as $u)
          <tr >
              <td>{{ ++$i }}</td>
              <td>{{ $u->name}}</td>
          <td>{{$u->campus->name}}</td>
              
              <td>
            {!! Form::open(['action'=>[ 'FucultyController@destroy',$u->id], 'method'=>'POST'])!!}
                    @method('DELETE')
                  <a class="bt btn-sm btn btn-info" href="/fuculties/{{$u->id}}">Show</a>
              
                @can('isAdmin')
                  <a class=" btn btn-sm btn btn-primary" href="/fuculties/{{$u->id}}/edit">Edit</a>
                
                
                 
                
                  {!! Form::submit('Delete', ['class' => ' btn btn-sm btn btn-danger']) !!}
                  @endcan
                  {!! Form::close() !!}
                  
              </td>
          </tr>
          @endforeach
        </table>
      
      {{ $fac->links() }}
 

    
        @endsection