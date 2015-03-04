@extends('layout.admain')

@section('body')
<div class="col-md-12">
  <div class="col-md-6">
    <h2> Subject List </h2>
    <a href="{{ URL::to('admin/bachelor') }}" class="btn btn-material-red-500">Manage All Courses</a>
    <a href="{{ URL::to('admin/course') }}" class="btn btn-material-cyan">Offered Courses</a>
  </div>
  <div class="col-md-6">
  <div class="row">
   <a href="{{ URL::to('admin/subject/create') }}" class="btn btn-fab btn-fab-mini btn-raised btn-sm btn-success pull-right" title="Add Subject"><span class="glyphicon glyphicon-plus"></span></a> 
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
        	  <th>Degree</th>
        	  <th>Subject Code</th>
            <th>Subject Description</th>
            <th>Units</th>
        	</tr>
      		</thead>
      		<tbody>
        	@foreach($data as $item)
        	<tr>
        	  <th>{{$item['_id']}}</th>
             <td>{{$item['course']}}</td>
       		   <td>{{$item['code']}}</td>
       		   <td>{{$item['description']}}</td>
             <td>{{$item['units']}}</td>
       		   <td> 
                {{ Form::open(array('url' => 'admin/subject'.'/'.$item['_id'], 'method' => 'DELETE' )) }}
                <a href="{{ URL::to('admin/subject').'/'.$item['_id'].'/edit' }}" title="Edit" class="btn btn-customized btn-material-light-blue"><span class="fa fa-pencil-square-o"></span></a>
                | <button type="submit" onclick="return confirm('Are you sure you want to delete this subject? This subject may be associated with staff, users, schedules, etc. deleting this subject may affect the associated items. Continue?')" class="btn btn-customized btn-material-red" title="Delete Subject"><span class="fa fa-trash-o"> </span></button>           
                {{ Form::close() }}
              </td>
       		</tr>
   			@endforeach
      </tbody>
		</table>
        {{ $data->links() }}
@stop