@extends('layout.admain')

@section('body')
	<h2>Users Management</h2>
	@if( !empty($data[0]) )
		<table class="table table-hover">
		<a href="{{ URL::to('admin') }}" class="btn btn-danger">Back to Dashboard</a> &nbsp;
		<a href="{{ URL::to('admin/user/create') }}" class="btn btn-primary">Add Users</a>
			<thead>
				<th></th>
				<th>Full Name</th>
				<th>Username</th>
				<th>Email</th>	
			</thead>
			<tbody>
		@foreach($data as $item)
			<tr>
				<th>{{ $item['_id'] }}</th>
				<td>{{ $item['firstname'].' '.$item['middlename'].' '.$item['lastname'] }} </td>
				<td>{{ $item['username'] }}</td>
				<td>{{ $item['email'] }}</td>
				<td>
				{{ Form::open(array('url' => 'admin/user'.'/'.$item['_id'], 'method' => 'DELETE' )) }}
                <a href="{{ URL::to('admin/user').'/'.$item['_id'].'/edit' }}" title="Edit Book" class="btn btn-customized btn-success"><span class="fa fa-pencil-square-o"></span></a>
                | <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')" class="btn btn-customized btn-danger" title="Delete Book"><span class="fa fa-trash-o"> </span></button>           
                {{ Form::close() }}
                </td>
			</tr>
		@endforeach
			</tbody>
		</table>

		{{ $data->links() }}
	@else
		<h3>No Users</h3>
	@endif
@stop