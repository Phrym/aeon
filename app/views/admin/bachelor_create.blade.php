@extends('layout.admain')

@section('body')
<h2>Add Bachelor Degree</h2>
{{ Form::open(array('url' => 'admin/bachelor', 'class' => 'form-signin')) }}
    @if( $errors->all() )
   <div class="alert alert-warning">
    @foreach($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
    </div>
    @endif
        <label for="code" >Bachelor Degree Code: </label>
        {{ Form::text('code', Input::old('code'), array('placeholder' => 'Bachelor Degree Code', 'class' => 'form-control')) }}
        
        <label for="description" >Bachelor Degree Description / Full Bachelor Degree: </label>
        {{ Form::text('description', Input::old('description') , array('placeholder' => 'Bachelor Degree Description', 'class' => 'form-control')) }}
           <label for="isOffered">
            Offer this Course for Scheduling? :</label>
            <div class="togglebutton">
                <label> No
                {{ Form::checkbox('isOffered',true, ['checked']) }}
                Yes
                </label> 
            </div>
            <label for="year"> Year Level: </label>
            {{ Form::text('year', Input::old('year') ,array('class' => 'form-control')) }}
            <label for="section"> Section: </label>
            {{ Form::text('section', Input::old('section') ,array('class' => 'form-control')) }}
           <label for="shift">
            Shift :</label>
            <div class="togglebutton">
                <label> Night
                {{ Form::checkbox('shift',"morning", ['checked']) }}
                Morning
                </label> 
            </div>
            <br />
        <br />
        {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary btn-block')) }}
{{ Form::close() }}
@stop