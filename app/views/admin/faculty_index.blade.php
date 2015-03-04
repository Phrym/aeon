@extends('layout.admain')

@section('body')
<div class="col-md-12">
  <div class="col-md-6">
    <h2> Faculty List </h2>
    <small><a href="{{ URL::to('admin/staff') }}" class="btn btn-material-teal"><span class="fa fa-users"></span> Manage Staffs</a></small>
  </div>
  <div class="col-md-6">
  <div class="row">
    <button class="btn btn-fab btn-fab-mini btn-raised btn-sm btn-success pull-right" data-toggle="modal" data-target="#faculty-dialog" title="Add Faculty"><span class="glyphicon glyphicon-plus"></span></button>    
  </div>
  <div class="row">
    
  </div>
  <div class="row">
  <div class="col-md-8">
  {{ Form::open(['method' => 'GET']) }}
  <div class="row">
  <div class="col-md-9">
    {{ Form::text('q', '', ['class' => 'form-control', 'placeholder' => 'Search']) }}
  </div>
  </div>
  <div class="row">
  <div class="col-md-9">
    <input type="submit" class="btn btn-material-pink btn-block" value="Search!">
  </div>
  </div> 
  {{ Form::close() }}     
  </div>
  </div>
  </div>
</div>
    <table class="table table-hover">
        <thead>
          <tr>
            <th></th>
            <th>Name</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Bachelor Course</th>
            <th>Status</th>
            <th>Admin Designation</th>
          </tr>
          </thead>
          <tbody>
          @foreach($data as $item)
          <tr>
            <th>{{$item['_id']}}</th>
             <td>{{$item['firstname'].' '.$item['middlename'].' '.$item['lastname']}}</td>
             <td>{{$item['gender']}}</td>
             <td>{{$item['email']}}</td>
             <td>{{$item['bachelor_degree']}}</td>
             <td>{{$item['status']}}</td>
             <td>{{$item['designation']}}</td> 
             <td>
                     {{ Form::open(array('url' => 'admin/faculty'.'/'.$item['_id'], 'method' => 'DELETE' )) }}
                      <button type="submit" onclick="return confirm('Are you sure you want to delete this staff? This staff may be associated with faculty, users, schedules, etc. deleting this staff may affect the associated items. Continue?')" class="btn btn-customized btn-material-red" title="Delete Staff"><span class="fa fa-trash-o"> </span></button>           
                     {{ Form::close() }}
                </td>
          </tr>
        @endforeach
      </tbody>
    </table>
        {{ $data->links() }}
  <div id="faculty-dialog" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
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
        {{ Form::submit('Add to Faculty List', array('class' => 'btn btn-lg btn-primary btn-block')) }}
        {{ Form::close() }}
      </div>
    </div>
  </div>
  </div>

@stop