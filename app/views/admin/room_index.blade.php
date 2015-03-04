@extends('layout.admain')

@section('body')

<div class="col-md-12">
  <div class="col-md-6">
    <h2> Room List </h2>
  </div>
  <div class="col-md-6">
    <a href="{{ URL::to('admin/room/create') }}" class="btn btn-fab btn-fab-mini btn-raised btn-sm btn-success pull-right" title="Add Room"><span class="glyphicon glyphicon-plus"></span></a>
  </div>
</div>
		<table class="table table-hover">
  			<thead>
        	<tr>
        	  <th></th>
        	  <th>Room Code</th>
        	  <th>Room Description</th>
        	</tr>
      		</thead>
      		<tbody>
        	@foreach($data as $item)
        	<tr>
        	  <th>{{$item['_id']}}</th>
       		   <td>{{$item['room']}}</td>
       		   <td>{{$item['description']}}</td>
       		   <td>
                {{ Form::open(array('url' => 'admin/room'.'/'.$item['_id'], 'method' => 'DELETE' )) }}
                <a href="{{ URL::to('admin/room').'/'.$item['_id'].'/edit' }}" title="Edit" class="btn btn-customized btn-material-light-blue"><span class="fa fa-pencil-square-o"></span></a>
                | <button type="submit" onclick="return confirm('Are you sure you want to delete this room? This room may be associated with faculty, users, schedules, etc. deleting this room may affect the associated items. Continue?')" class="btn btn-customized btn-material-red" title="Delete Room"><span class="fa fa-trash-o"> </span></button>           
                {{ Form::close() }}
              </td>
       		</tr>
   			@endforeach

      </tbody>
		</table>

        {{ $data->links() }}
@stop