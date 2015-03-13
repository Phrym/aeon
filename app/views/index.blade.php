	@extends('layout.main')
  @section('extra-css')
<link rel="stylesheet" href="{{ URL::asset('assets/css/extra.css') }}"> 
	@stop
	@section('body')

		{{ Form::open(array('url' => 'login', 'class' => 'form-signin')) }}
        <p align="center"><img src="{{ URL::asset('assets/img/logo.png') }}" width="100px" height="100px"></p>
        <?php $e = explode("-", $title)?>
        @if(count($e) > 1)
          <h2 class="form-signin-heading heading" align="center">{{ $e[0] }}</h2>
          <h2 class="form-signin-heading heading" align="center">{{ $e[1] }}</h2>
        @else
          <h2 class="form-signin-heading heading" align="center">{{ $title }}</h2>
        @endif
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
        <small class="pull-left foot">&copy; 2015 CTU Scheduler - by: <a href="https://www.facebook.com/rwx777kid.ph">@yakovmeister</a></small><br />  
        <small> <a href="{{ URL::to('schedule') }}">Schedules</a> | <a href="{{ URL::to('about') }}">About</a> | <a href="{{ URL::to('help') }}">Help</a> </small>
        </div>
      {{ Form::close() }}
	@stop

  @section('extra-js')
  <script type="text/javascript" src="{{ URL::asset('assets/js/ng-starter.js') }}"></script>
  @stop