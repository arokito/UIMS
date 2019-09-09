@extends('layouts.app')
@section('content')





          <div class="row">
              <div class="col-lg-12 margin-tb">
                  <div class="pull-left">
                      <h2>programmes</h2>
                  </div>
                  <div class="pull-right">
                      @can('isAdmin')
                      <a class="btn btn-success"  style="float:right" href="/programmes/create"> add programme</a>
                      @endcan
                  </div>
              </div>
          </div>
      
      
          
      
    <table class="table table-bordered">
              <tr>
                  <th>No</th>
                  <th width="300">programme</th>
                  <th width="300">department</th>
                  
                  <th width="300px">Action</th>
              </tr>
         @foreach ($pro as $u)
             <tr >  
                 <td>{{ ++$i }}</td>
                 <td>{{ $u->name}}</td>
                 <td>{{$u->department->name}}</td>
              
                 <td>
                 {!! Form::open(['action'=>[ 'ProgrammeController@destroy',$u->id], 'method'=>'POST'])!!}
                    @method('DELETE')
                  <a class="bt btn-sm btn btn-info" href="/programmes/{{$u->id}}">Show</a>
              
                @can('isAdmin')
                  <a class=" btn btn-sm btn btn-primary" href="/programmes/{{$u->id}}/edit">Edit</a>
                
                
                 
                
                  {!! Form::submit('Delete', ['class' => ' btn btn-sm btn btn-danger']) !!}
                  @endcan
                  {!! Form::close() !!}
                  
                 </td>
             </tr>

          @endforeach

    </table>
      
      {{ $pro->links() }}
 

        @endsection