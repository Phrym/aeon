@extends('layout.admain')

@section('body')
<h2>Subject Edit</h2>
{{ Form::open(array('url' => 'admin/subject', 'class' => 'form-signin')) }}
    @if( $errors->all() )
   <div class="alert alert-warning">
    @foreach($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
    </div>
    @endif
        <label for="code" >Subject Code / Short Subject Name: </label>
        {{ Form::text('code', $input = ($item['code']) ? $item['code'] : Input::old('code'), array('placeholder' => 'Subject Code', 'class' => 'form-control')) }}
        
        <label for="description" >Subject Description / Full Subject Name: </label>
        {{ Form::text('description', $input = ($item['description']) ? $item['description'] : Input::old('description') , array('placeholder' => 'Subject Description', 'class' => 'form-control')) }}
        <label for="bachelor_id"> Bachelor Course: </label>
        {{ Form::select('bachelor_id', $course, $input = ($item['course']) ? $item['course'] : Input::get('bachelor_id') ,array('class' => 'form-control')) }}
        <br />
        <label for="major"> Units: </label>
        {{ Form::text('units', $input = ($item['units']) ? $item['units'] :Input::old('units') ,array('class' => 'form-control')) }}
        <br />
        {{ Form::submit('Edit', array('class' => 'btn btn-lg btn-primary btn-block')) }}
{{ Form::close() }}
@stop