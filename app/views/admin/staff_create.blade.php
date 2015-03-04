@extends('layout.admain')

@section('body')
<h2>Staff Create</h2>
{{ Form::open(array('url' => 'admin/staff', 'class' => 'form-signin')) }}
    @if( $errors->all() )
   <div class="alert alert-warning">
    @foreach($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
    </div>
    @endif
        <label for="firstname" >First Name: </label>
        {{ Form::text('first_name', Input::old('first_name'), array('placeholder' => 'First Name', 'class' => 'form-control')) }}
        
        <label for="middlename" >Middle Name: </label>
        {{ Form::text('middle_name', Input::old('middle_name') , array('placeholder' => 'Middle Name', 'class' => 'form-control')) }}
        <label for="lastname"> Last Name: </label>
        {{ Form::text('last_name', Input::old('last_name'), array('placeholder' => 'Last Name', 'class' => 'form-control')) }}
        <label for="gender"> Gender:</label> <br />
       <div class="radio radio-primary">
            <label>
                {{ Form::radio('gender', 'male') }}
                Male
            </label>
            <label>
                {{ Form::radio('gender', 'female') }}
                Female
            </label>
        </div>
        <label for="email">Email: </label>{{ Form::text('email', Input::old('email'), array('placeholder' => 'Email', 'class' => 'form-control')) }}
        <label for="bachelor_id"> Bachelor Course: </label>
        {{ Form::select('bachelor_id', $course, '' ,array('class' => 'form-control')) }}
        <br />
        <label for="major"> Major: </label>
        {{ Form::text('major', Input::old('major') ,array('class' => 'form-control')) }}
        <br />
        <label for="minor"> Minor: </label>
        {{ Form::text('minor', Input::old('minor') ,array('class' => 'form-control')) }}
        <br />
        <label for="status_id"> Status: </label>
        {{ Form::select('status_id', $status, '' ,array('class' => 'form-control')) }}
        <br />
         <label for="designation_id"> Administrative Designation: </label>
        {{ Form::select('designation_id', $designation, '' ,array('class' => 'form-control')) }}
        <br />
        {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary btn-block')) }}
{{ Form::close() }}
@stop