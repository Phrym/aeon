@extends('layout.admain')

@section('body')

<div class="col-md-12">
  <div class="col-md-6">
    <h2> Designation List </h2>
    <a href="{{ URL::to('admin/status') }}" class="btn btn-material-pink">Manage Statuses</a>
    <table class="table table-hover">
        <thead>
          <tr>
            <th></th>
            <th>Designation</th>
          </tr>
          </thead>
          <tbody>
          @foreach($data as $item)
          <tr>
            <th>{{$item['_id']}}</th>
             <td>{{$item['designation']}}</td>
             <td>
                {{ Form::open(array('url' => 'admin/designation'.'/'.$item['_id'], 'method' => 'DELETE' )) }}
                <button type="submit" onclick="return confirm('Are you sure you want to delete this Designation? This designation may be associated with faculty, users, schedules, etc. deleting this room may affect the associated items. Continue?')" class="btn btn-customized btn-material-red" title="Delete Designation"><span class="fa fa-trash-o"> </span></button>           
                {{ Form::close() }}
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>
        {{ $data->links() }}
  </div>
  <div class="col-md-6">
    <h2 class="pull-right">Add Designation</h2>
    <div class="col-md-12">
    <a href="{{ URL::to('admin') }}" class="btn btn-material-lightgreen">Home</a>
    <a href="{{ URL::to('admin/administrative') }}" class="btn btn-material-teal">Administrative Options</a>  
    </div>
    
    <div class="col-md-12">
      {{ Form::open(array('url' => 'admin/designation', 'class' => 'form-signin')) }}
      @if($errors->all())
      <div class="alert alert-warning">
      @foreach($errors->all() as $error)
      <p>{{ $error }}</p>
      @endforeach
      </div>
      @endif
        <label for="designation"> Designation: </label>
        {{ Form::text('designation', Input::old('designation'), array('placeholder' => 'Designation Name', 'class' => 'form-control', 'required')) }}
        <br />
        {{ Form::submit('Add', array('class' => 'btn btn-lg btn-primary btn-block')) }}
        <div>
        </div>
{{ Form::close() }}
  
    </div>
 </div>
  
</div>	
@stop