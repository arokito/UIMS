@extends('layouts.app')
@section('content')





          <div class="row">
              <div class="col-lg-12 margin-tb">
                  <div class="pull-left">
                      <h2>universities</h2>
                  </div>
                  <div class="pull-right">
                      @can('isAdmin')
                      <a class="btn btn-success" style="float:right" href="/universities/create"> add university</a>
                      @endcan
                  </div>
              </div>
          </div>
      
      
          
      
          <table class="table table-bordered">
              <tr>
                  <th>No</th>
                  <th width="400">universities</th>
                  
                  <th width="200px">Action</th>
              </tr>
          @foreach ($uni as $u)
          <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $u->name}}</td>
              
              <td>
              
              {!! Form::open(['action'=>[ 'UniversityController@destroy',$u->id], 'method'=>'POST'])!!}
                    @method('DELETE')
                
                  <a class="bt btn-sm btn btn-info" href="/universities/{{$u->id}}">Show</a>
                
                @can('isAdmin')
                  <a class=" btn btn-sm btn btn-primary" href="/universities/{{$u->id}}/edit">Edit</a>
                
                  
            {!! Form::submit('Delete', ['class' => ' btn btn-sm btn btn-danger']) !!}
                @endcan  
            {!! Form::close() !!}
            

              </td>
          </tr>
          @endforeach
          </table>
      
      
 
{{ $uni->links() }}
    
@endsection