@extends('layouts.app')
@section('content')

{!!Form::open(['action'=>'DepartmentController@store','method'=>'POST'])!!}
{{ csrf_field() }}
<div class="form-group">
{{Form::label('name','Name')}}
{{Form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}
</div> 
<div class="form-group">
{{Form::label('fuculty_id','fuculty')}}
{{Form::select('fuculty_id',$fuculty,null,['class'=>'form-control'])}}
</div>
<div class="form-group">
        
{!! Form::submit('Submit', ['class' => 'btn btn-primary'] ) !!}
        
    </div>
{!!Form::close()!!}
@endsection