<!DOCTYPE HTML>
<html>
	<head>
		<title>{{ $short_title }}</title>
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/font-awesome.css') }}">
		<link rel="shortcut icon" href="{{ URL::asset(  $short_icon ) }}">
		<style>
			body {
				margin: 0 auto;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}
			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 72px;
				margin-bottom: 40px;
			}

			.header {
				font-size: 40px;
				margin-bottom: 40px;
			}
		</style>
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
			<div class="content">
				<div class="header">The Portal to Time Travel is broken!</div>
				<div class="title">Dead End Bruh!</div>
				<a href="{{ URL::to('/') }}" align="center">Get me outta here!</a>
			</div>

		</div>
	</body>


	<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
	@yield('extra-js')
</html>
