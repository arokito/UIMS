@extends('layouts.app')
@section('content')

{!!Form::open(['action'=>['FucultyController@update',$fac->id],'method'=>'POST'])!!}
@method('PUT')
{{ csrf_field() }}
<div class="form-group">
{{Form::label('name','Name')}}
{{Form::text('name',$fac->name,['class'=>'form-control','placeholder'=>'Name'])}}
</div>
<div class="form-group">
    {{Form::label('campus_id','campus')}}
    {{Form::select('campus_id',$campus,null,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
                
    {!! Form::submit('Submit', ['class' => 'btn btn-primary'] ) !!}
        
   </div>
{!!Form::close()!!}
@endsection