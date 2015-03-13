@extends('layout.main')

@section('extra-css')

<style type="text/css">
	body {
		background: rgba(255,255,255,0.7);
		background-attachment: fixed;
		background-size: cover;
	}
	.scbg {
		background-color: #efefef;
		padding-top: 15%;
		height: 100%;
		width: 100%;
	}
</style>
@stop

@section('body')
	
	<div class="col-md-2">
		<a href="{{ url('index') }}" class="label label-primary">back</a>
	</div>
	<div class="col-md-8">
	 	<h2>Schedule List</h2>
	 	<div class="scbg">
	 	@foreach($courses as $course)
	 	<div class="col-md-4">
	 		<a href="{{ url('schedule') }}?courses={{ $course['id']}}" align="center">{{ $course['curriculum'] }}</a>
	 	</div>	 		
	 	@endforeach
 		</div>
	</div>
	<div class="col-md-2">
		
	</div>
  
@stop