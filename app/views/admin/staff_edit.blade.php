@extends('layout.admain')

@section('body')
<h2>Update Staff</h2>
{{ Form::open(array('url' => 'admin/staff/'.$item["_id"], 'class' => 'form-signin', 'method' => 'PUT')) }}
     @if( $errors->all() )
   <div class="alert alert-warning">
    @foreach($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
    </div>
    @endif
        <label for="firstname" >First Name: </label>
        {{ Form::text('first_name', $input = ($item['firstname']) ? $item['firstname'] : Input::old('first_name'), array('placeholder' => 'First Name', 'class' => 'form-control')) }}
        
        <label for="middlename" >Middle Name: </label>
        {{ Form::text('middle_name', $input = ($item['middlename']) ? $item['middlename'] : Input::old('middle_name') , array('placeholder' => 'Middle Name', 'class' => 'form-control')) }}
        <label for="lastname"> Last Name: </label>
        {{ Form::text('last_name', $input = ($item['lastname']) ? $item['lastname'] : Input::old('last_name'), array('placeholder' => 'Last Name', 'class' => 'form-control')) }}
        <label for="gender"> Gender:</label> <br />
       <div class="radio radio-primary">
            @if($item['gender'] == 'male')
            <label>
                {{ Form::radio('gender', 'male',true) }}
                Male
            </label>
            <label>
                {{ Form::radio('gender', 'female') }}
                Female
            </label>
            @elseif($item['gender'] == 'female')
            <label>
                {{ Form::radio('gender', 'male') }}
                Male
            </label>
            <label>
                {{ Form::radio('gender', 'female',true) }}
                Female
            </label>
            @else
            <label>
                {{ Form::radio('gender', 'male') }}
                Male
            </label>
            <label>
                {{ Form::radio('gender', 'female') }}
                Female
            </label>
            @endif
        </div>
        <label for="email">Email: </label>{{ Form::text('email', $input = ($item['email']) ? $item['email'] : Input::old('email'), array('placeholder' => 'Email', 'class' => 'form-control')) }}
        <label for="bachelor_id"> Bachelor Course: </label>
        {{ Form::select('bachelor_id', $course, '' ,array('class' => 'form-control')) }}
        <br />
        <label for="major"> Major: </label>
        {{ Form::text('major', $input = ($item['major']) ? $item['major'] : Input::old('major') ,array('class' => 'form-control')) }}
        <br />
        <label for="minor"> Minor: </label>
        {{ Form::text('minor', $input = ($item['minor']) ? $item['minor'] : Input::old('minor') ,array('class' => 'form-control')) }}
        <br />
        <label for="status_id"> Status: </label>
        {{ Form::select('status_id', $status, '' ,array('class' => 'form-control')) }}
        <br />
         <label for="designation_id"> Administrative Designation: </label>
        {{ Form::select('designation_id', $designation, '' ,array('class' => 'form-control')) }}
        <br />
        <br />
        {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary btn-block')) }}
        <div>
        </div>
{{ Form::close() }}


@stop