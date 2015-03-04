@extends('layout.admain')

@section('body')

<div class="col-md-12">
  <div class="col-md-6">
    <h2> Bachelor Degree List </h2>
  </div>
  <div class="col-md-6">
    <a href="{{ URL::to('admin/bachelor/create') }}" class="btn btn-fab btn-fab-mini btn-raised btn-sm btn-success pull-right" title="Add Bachelor"><span class="glyphicon glyphicon-plus"></span></a>
  </div>
</div>
		<table class="table table-hover">
  			<thead>
        	<tr>
        	  <th></th>
        	  <th>Degree</th>
        	  <th>Description</th>
            <th>Offered Course</th>
        	</tr>
      		</thead>
      		<tbody>
        	@foreach($data as $item)
        	<tr>
        	  <th>{{$item['_id']}}</th>
       		   <td>{{$item['course']}}</td>
       		   <td>{{$item['description']}}</td>
             <td>{{ Form::checkbox('offered_course', $item['_id'] , $item['offered'], [ 'disabled']) }}</td>
       		   <td>
                {{ Form::open(array('url' => 'admin/bachelor'.'/'.$item['_id'], 'method' => 'DELETE' )) }}
                <a href="{{ URL::to('admin/bachelor').'/'.$item['_id'].'/edit' }}" title="Edit" class="btn btn-customized btn-material-light-blue"><span class="fa fa-pencil-square-o"></span></a>
                | <button type="submit" onclick="return confirm('Are you sure you want to delete this degree? This degree may be associated with faculty, users, schedules, etc. deleting this degree may affect the associated items. Continue?')" class="btn btn-customized btn-material-red" title="Delete Bachelor">
                <span class="fa fa-trash-o"> </span>
                </button>           
                {{ Form::close() }}
              </td>
       		</tr>
   			@endforeach
      </tbody>
		</table>
        {{ $data->links() }}
@stop