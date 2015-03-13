@extends('layout.admain')

@section('body')
<h2>Add User</h2>
<a href="{{ URL::to('admin') }}" class="btn btn-danger">Back to Dashboard</a> &nbsp;
{{ Form::open(array('url' => 'admin/users/'.$item['_id'], 'class' => 'form-signin', 'method' => 'PUT')) }}
    @if( $errors->all() )
   <div class="alert alert-warning">
    @foreach($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
    </div>
    @endif

        <label for="username" >Username: </label>
        {{ Form::text('username', $input = ($item['username'] ? $item['username'] : Input::old('username') ), array('placeholder' => 'UserName', 'class' => 'form-control')) }}
        
        <label for="password" >Password: </label>
        {{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) }}


     <br />
        {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary btn-block')) }}
{{ Form::close() }}
@stop