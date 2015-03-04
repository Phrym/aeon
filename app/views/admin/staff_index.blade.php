@extends('layout.admain')

@section('body')
<div class="col-md-12">
  <div class="col-md-6">
    <h2> Staff List </h2>
    <a href="{{ URL::to('admin/account') }}" class="btn btn-fab btn-fab-mini btn-raised btn-sm btn-material-pink" title="My Account"><span class="fa fa-user"></span></a>
    <a href="{{ URL::to('admin/administrative') }}" class="btn btn-fab btn-fab-mini btn-raised btn-sm btn-material-light-blue" title="Administrative Options"><span class="fa fa-cogs"></span></a> 
  </div>
  <div class="col-md-6">
  <div class="row">
    <a href="{{ URL::to('admin/staff/create') }}" class="btn btn-fab btn-fab-mini btn-raised btn-sm btn-success pull-right" title="Create Staff"><span class="glyphicon glyphicon-plus"></span></a>    
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
                     {{ Form::open(array('url' => 'admin/staff'.'/'.$item['_id'], 'method' => 'DELETE' )) }}
                     <a href="{{ URL::to('admin/staff').'/'.$item['_id'] }}" title="View" class="btn btn-customized btn-material-light-green"><span class="fa fa-eye"></span></a>
                      | <a href="{{ URL::to('admin/staff').'/'.$item['_id'].'/edit' }}" title="Edit" class="btn btn-customized btn-material-light-blue"><span class="fa fa-pencil-square-o"></span></a>
                      | 
                      <button type="submit" onclick="return confirm('Are you sure you want to delete this staff? This staff may be associated with faculty, users, schedules, etc. deleting this staff may affect the associated items. Continue?')" class="btn btn-customized btn-material-red" title="Delete Staff"><span class="fa fa-trash-o"> </span></button>           
                     {{ Form::close() }}
                </td>
       		</tr>
   			@endforeach
      </tbody>
		</table>
        {{ $data->links() }}
@stop