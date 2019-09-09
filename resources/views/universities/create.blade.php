@extends('layouts.app')
@section('content')

    {!!Form::open(['action'=>'UniversityController@store','method'=>'POST'])!!}
    {{ csrf_field() }}
    <div class="form-group">
       {{Form::label('name','Name')}}
       {{FOrm::text('name','',['class'=>'form-control','placeholder'=>'name'])}}
    </div>
    <div class="form-group">
            {{Form::label('telephone','Telephone')}}
            {{FOrm::text('telephone','',['class'=>'form-control','placeholder'=>'Telephone'])}}
    </div>
    <div class="form-group">
         {{Form::label('email','Email')}}
         {{Form::text('email','',['class'=>'form-control','placeholder'=>'Email'])}}
             
    </div>
    <div class="form-group">
       {{Form::label('physical_address','Physical-address')}}
       {{FOrm::text('physical_address','',['class'=>'form-control','placeholder'=>'Physical-address'])}}
    </div>
                
                  
    <div class="form-group">
      {{Form::label('organization_type','Organization_type')}}
      {{Form::select('organization_type_id',$organizationTypes,null,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
          {!! Form::submit('Submit', ['class' => 'btn btn-primary'] ) !!}
      </div>
  </div>
                
    {!!Form::close()!!}
 
@endsection