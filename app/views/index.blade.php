	@extends('layout.main')
  @section('extra-css')
<link rel="stylesheet" href="{{ URL::asset('assets/css/extra.css') }}"> 
	@stop
	@section('body')

		{{ Form::open(array('url' => 'login', 'class' => 'form-signin')) }}
        <p align="center"><img src="{{ URL::asset('assets/img/logo.png') }}" width="100px" height="100px"></p>
        <h2 class="form-signin-heading heading" align="center">{{ $title }}</h2>

        @if ( $errors->first('username') || $errors->first('password'))
        <div class="alert alert-warning">	
 	          <p>{{ $errors->first('username') }}</p>
		        <p>{{ $errors->first('password') }}</p>
		    </div>
		    @endif
        <label for="username" class="labels">Username: </label>
        {{ Form::text('username', Input::old('username'), array('placeholder' => 'Username', 'class' => 'form-control')) }}
        <label for="password" class="labels">Password: </label>
        {{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) }}
        <br />
        {{ Form::submit('Sign In', array('class' => 'btn btn-lg btn-primary btn-block')) }}
        <div>
        <small> <a href="{{ URL::to('schedule') }}">Schedules</a> | <a href="{{ URL::to('about') }}">About</a> | <a href="{{ URL::to('help') }}">Help</a> </small>
        <small class="pull-right foot">&copy; The Aeon Project 2014</small>  
        </div>
      {{ Form::close() }}
	@stop

  @section('extra-js')
  <script type="text/javascript" src="{{ URL::asset('assets/js/ng-starter.js') }}"></script>
  @stop