@extends('layout.admain')

@section('body')


{{ Form::open(array('url' => 'admin/room', 'class' => 'form-signin')) }}
    @if($errors->all())
    <div class="alert alert-warning">
    @foreach($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
    </div>
    @endif
        <label for="code" >Room Code: </label>
        {{ Form::text('code', ($item['room']) ? $item['room']  : Input::old('code'), array('placeholder' => 'Room Code', 'class' => 'form-control')) }}
        
        <label for="description" >Description: </label>
        {{ Form::text('description', ($item['description']) ? $item['description'] : Input::old('description') , array('placeholder' => 'Room Description', 'class' => 'form-control')) }}
        <br />
        {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary btn-block')) }}
        <div>
        </div>
{{ Form::close() }}
@stop