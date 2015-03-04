@extends('layout.admain')
@section('extra-css')

@stop
@section('body')
<h2>Aeon Configuration</h2>
<small>License Owner - {{ $campus_director }}</small>
<br /><br /><br />
{{ Form::open(array('url' => 'admin/config', 'class' => 'form-signin')) }}
    @if ( $errors->first('short_title') || $errors->first('long_title') || $errors->first('campus_director'))
    <div class="alert alert-warning">	
 	    <p>{{ $errors->first('short_title') }}</p>
		<p>{{ $errors->first('long_title') }}</p>
        <p>{{ $errors->first('campus_director') }}</p>
	</div>
	@endif
        <label for="short_title" >Short Title: </label>
        {{ Form::text('short_title', $input = (Input::old()) ? Input::old('short_title') : $short_title, array('placeholder' => 'Short Title', 'class' => 'form-control')) }}
        <label for="long_title"> Main Title: </label>
        {{ Form::text('long_title', $input = (Input::old()) ? Input::old('long_title') : $title, array('placeholder' => 'Main Title', 'class' => 'form-control')) }}
        <label for="campus_director" >Campus Director: </label>
        {{ Form::text('campus_director', $input = (Input::old()) ? Input::old('campus_director') : $campus_director, array('placeholder' => 'Campus Director', 'class' => 'form-control')) }}
      
        <br />
        {{ Form::submit('Reconfigure', array('class' => 'btn btn-lg btn-primary btn-block')) }}
        <div>
        </div>
{{ Form::close() }}
@stop