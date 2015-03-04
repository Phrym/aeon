@extends('layout.admain')

@section('body')

{{ Form::open(array('url' => 'admin/faculty', 'class' => 'form-signin')) }}
    @if( $errors->all() )
   <div class="alert alert-warning">
    @foreach($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
    </div>
    @endif
         <label for="staff_id"> Faculty: </label>
        {{ Form::select('staff_id', $staff, '' ,array('class' => 'form-control')) }}
        <br />
        {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary btn-block')) }}
{{ Form::close() }}
@stop