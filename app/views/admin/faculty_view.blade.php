@extends('layout.admain')

@section('body')
  <center>
    <a href="{{ URL::to('admin/staff') }}" class="btn btn-material-teal">Back to Staffs</a> 
    <a href="{{ URL::to('admin/faculty') }}" class="btn btn-material-teal">Back to Faculties</a>
  </center>
  <div class="jumbotron">
    <h1 align="center">{{ $item['firstname'].' '.$item['middlename'].' '.$item['lastname'] }} <small><a href="{{URL::to('admin/staff').'/'.$item['_id'].'/edit'}}"><span class="fa fa-pencil-square-o"></span></a></small></h1>
    <p align="center">{{ $item['bachelor_degree_description']}} <br /> {{ $item['email'] }}</p>
    <p align="center">{{ $item['designation'].' : '. $item['status'] }}</p>
  </div>
  <div class="col-md-12">
  <div class="col-md-1">
  	
  </div>
  <div class="col-md-10">
  	<h3>Units: {{ $units }}</h3>
  	<h3>Schedules: </h3>
  	<table class="table table-condensed">
  		<thead>
  			
  		</thead>
  		<tbody id="scheduleContainer">
  			
  		</tbody>
  	</table>
  </div>
  <div class="col-md-1">
  	
  </div>
  </div>
@stop

@section('extra-js')
	<script type="text/javascript">
		$(function(){
			
		});
	</script>
@stop