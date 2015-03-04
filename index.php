<?php include('x1install/install_core.php') ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Aeon Project Installer</title>
		<link rel="stylesheet" href="public/assets/css/bootstrap.min.css"> 
		<link rel="stylesheet" href="public/assets/css/material.css"> 
		<link rel="stylesheet" href="public/assets/css/material-wfont.css">
		<link rel="stylesheet" href="public/assets/css/ripples.css"> 
		<link rel="stylesheet" type="text/css" href="public/assets/css/font-awesome.css">
	</head>
	<body>
	<div class="container">
		<h2 align="center">Installing {{ $app_info['app_name']."-v".$app_info['major'].".".$app_info['minor'].".".$app_info['patch'] }} <small>(build {{ "#".$app_info['build_number']  }})</small></h2>
			<div class="dialogbox">
				<p>You are about to install <span class="label label-success">{{$app_info['app_name']}}</span> version {{$app_info['major'].".".$app_info['minor'].".".$app_info['patch']}}. Please keep in mind that this application is primarily made for Cebu Technological University of Tuburan, if you're going to use or study this Project please give a proper credits to the Developers of this Application. You must meet the following requirements in order for this Application to run well.</p>
				<ul>
					<?php if(PHP_VERSION >= 5.4) { ?>
					<li><span class="label label-success">PHP >= 5.4</span></li>
					<?php } else { ?>
					<li><span class="label label-warning">PHP >= 5.4</span></li>
					<?php } ?>
					<?php if(function_exists("openssl_encrypt") == true) { ?>
					<li><span class="label label-success">OpenSSL Extension</span></li>
					<?php } else { ?>
					<li><span class="label label-warning">OpenSSL Extension</span></li>
					<?php } ?>
					<?php if(function_exists("mcrypt_encrypt") == true) { ?>
					<li><span class="label label-success">Mcrypt Extension</span></li>
					<?php } else { ?>
					<li><span class="label label-warning">Mcrypt Extension</span></li>
					<?php } ?>
				</ul>
				<p>Press Continue to Begin Installation.</p>
				<?php if(PHP_VERSION >= 5.4 && function_exists("openssl_encrypt") == true && function_exists("mcrypt_encrypt") == true): ?>
				<a href="{{ URL::to('install/check') }}" class="btn btn-material-teal">Continue</a>
				<?php else: ?>
				<a href="{{ URL::to('install/check') }}" class="btn btn-material-teal" disabled>Continue</a>
				<?php endif; ?>
			</div>
	</div>
	</body>
	<script type="text/javascript" src="public/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="public/assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="public/assets/js/material.js"></script>
	<script type="text/javascript" src="public/assets/js/ripples.js"></script>
	<script type="text/javascript" src="public/assets/js/angular.min.js"></script>
</html>