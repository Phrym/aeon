<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}"> 
	<link rel="stylesheet" href="{{ URL::asset('assets/css/material.css') }}"> 
	<link rel="stylesheet" href="{{ URL::asset('assets/css/material-wfont.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('assets/css/ripples.css') }}"> 
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/font-awesome.css') }}">
</head>
<body ng-app="Aeon">

	@include('x1partials.staff_all')

	<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/material.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/ripples.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/angular.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/underscore.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/angular-resource.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/restangular.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/app.js') }}"></script>
</body>
</html>