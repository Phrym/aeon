@extends('layout.admain')

@section('body')
  <div class="alert alert-material-light-green">
    <p>Hello! {{ Auth::user()->username }}</p>
    <center>
      <h2>Make Schedule For:</h2>
      {{ Form::open(['url' => 'admin/schedule/verify', 'method' => 'GET', 'class' => 'form-signin']) }}
        {{ Form::select('courses', $courses, '', ['class' => 'form-control']) }}
        {{ Form::submit('Plot Schedule Now', ['class' => 'btn btn-material-pink btn-lg btn-block'])}}
      {{ Form::close() }}
    </center>
  </div>
  
@stop