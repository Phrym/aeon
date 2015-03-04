@extends('layout.admain')

@section('body')
<h2>Subject Create</h2>
{{ Form::open(array('url' => 'admin/subject', 'class' => 'form-signin')) }}
    @if( $errors->all() )
   <div class="alert alert-warning">
    @foreach($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
    </div>
    @endif
        <label for="code" >Subject Code / Short Subject Name: </label>
        {{ Form::text('code', Input::old('code'), array('placeholder' => 'Subject Code', 'class' => 'form-control')) }}
        
        <label for="description" >Subject Description / Full Subject Name: </label>
        {{ Form::text('description', Input::old('description') , array('placeholder' => 'Subject Description', 'class' => 'form-control')) }}
        <label for="bachelor_id"> Bachelor Course: </label>
        {{ Form::select('bachelor_id', $course, '' ,array('class' => 'form-control')) }}
        <br />
        <label for="major"> Units: </label>
        {{ Form::text('units', Input::old('units') ,array('class' => 'form-control')) }}
        <br />
        {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary btn-block')) }}
{{ Form::close() }}
@stop