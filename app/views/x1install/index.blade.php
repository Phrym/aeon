<!DOCTYPE>
<html>
	<head>
		<title>{{ $title }}</title>
		<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}"> 
		<link rel="stylesheet" href="{{ URL::asset('assets/css/material.css') }}"> 
		<link rel="stylesheet" href="{{ URL::asset('assets/css/material-wfont.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('assets/css/ripples.css') }}"> 
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/font-awesome.css') }}">
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
			<h2 align="center">Installing {{ $app_info['app_name']."-v".$app_info['major'].".".$app_info['minor'].".".$app_info['patch'] }} <small>(build {{ "#".$app_info['build_number']  }})</small></h2>
			<div class="dialogbox">
				<p>You are about to install <span class="label label-success">{{$app_info['app_name']}}</span> version {{$app_info['major'].".".$app_info['minor'].".".$app_info['patch']}}. Please keep in mind that this application is primarily made for Cebu Technological University of Tuburan, if you're going to use or study this Project please give a proper credits to the Developers of this Application. You must meet the following requirements in order for this Application to run well.</p>
				<ul>
					@if($php5 == true)
					<li><span class="label label-success">PHP >= 5.4</span></li>
					@else
					<li><span class="label label-warning">PHP >= 5.4</span></li>
					@endif
					@if($openssl_installed == true)
					<li><span class="label label-success">OpenSSL Extension</span></li>
					@else
					<li><span class="label label-warning">OpenSSL Extension</span></li>
					@endif
					@if($mcrypt_installed == true)
					<li><span class="label label-success">Mcrypt Extension</span></li>
					@else
					<li><span class="label label-warning">Mcrypt Extension</span></li>
					@endif
				</ul>
				<p>Press Continue to Begin Installation.</p>
				@if($php5 == true && $openssl_installed == true && $mcrypt_installed == true)
				<a href="{{ URL::to('install/check') }}" class="btn btn-material-teal">Continue</a>
				@else
				<a href="{{ URL::to('install/check') }}" class="btn btn-material-teal" disabled>Continue</a>
				@endif
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