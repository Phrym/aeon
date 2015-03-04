<!DOCTYPE HTML>
<html>
	<head>
		<title>{{ $short_title }}</title>
		<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}"> 
		<link rel="stylesheet" href="{{ URL::asset('assets/css/material.css') }}"> 
		<link rel="stylesheet" href="{{ URL::asset('assets/css/material-wfont.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('assets/css/ripples.css') }}"> 
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/font-awesome.css') }}">
		<link rel="shortcut icon" href="{{ URL::asset(  $short_icon ) }}">
		@yield('extra-css')
	</head>

	<body>
		<div class="container">
			@if ( Session::has('success_message'))
				<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
					<p>{{ Session::get('success_message') }}</p>
				</div>
			@elseif ( Session::has('notif_message'))
				<div class="alert alert-primary">
                    <button type="button" class="close" data-dismiss="alert">×</button>
					<p>{{ Session::get('error_message') }}</p>
				</div>
			@elseif ( Session::has('error_message'))
				<div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert">×</button>
					<p>{{ Session::get('error_message') }}</p>
				</div>
			@endif
			<div>
				<p>Page not Found!</p>
			</div>
		</div>
	</body>


	<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/material.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/ripples.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/angular.min.js') }}"></script>
	@yield('extra-js')
</html>