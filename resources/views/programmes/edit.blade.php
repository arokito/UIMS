@extends('layouts.app')
@section('content')

{!!Form::open(['action'=>['ProgrammeController@update',$pro->id],'method'=>'POST'])!!}
@method('PUT')
{{ csrf_field() }}
<div class="form-group">
{{Form::label('name','Name')}}
{{Form::text('name',$pro->name,['class'=>'form-control','placeholder'=>'Name'])}}
</div>
<div class="form-group">
    {{Form::label('university_id','university')}}
    {{Form::select('university_id',$department,null,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
                
    {!! Form::submit('Submit', ['class' => 'btn btn-primary'] ) !!}
        
   </div>
{!!Form::close()!!}
@endsection