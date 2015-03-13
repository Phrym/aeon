@extends('layout.main')
@section('extra-css')
<style type="text/css">
	body {
		background: rgba(255,255,255,0.7);
		background-attachment: fixed;
		background-size: cover;
	}
</style>
@stop
@section('body')
<div class="container">		
	<h2>The Aeon Project</h2>
	<small>version  {{ \Aeon\Aeon::version()->version.".".\Aeon\Aeon::version()->minor_revision.".".\Aeon\Aeon::version()->patch }}</small>

	<h3>* Basics</h3>
	<h4>   - Viewing public schedule</h4>
	<p>On login page, click the "schedule link" at the bottom of the login button. you'll be redirected to schedule url after a while, then click the desired schedule link to view.</p>
	<h4>   - Printing schedule</h4>
	<p>Our printing works, however it isn't well organized as of this moment.. In order to print, click on the schedule you want to print and click the print button on the top right of the page.</p>
</div>

@stop