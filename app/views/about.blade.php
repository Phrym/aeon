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
<h2>The Aeon Project</h2>
<small>version {{ \Aeon\Aeon::version()->version.".".\Aeon\Aeon::version()->minor_revision.".".\Aeon\Aeon::version()->patch }}</small>
<br>

<p>--------------------------------------</p>
<br />
<p><!--This is the Final and End of Support for this Project. I decided to discontinue this project due to the lack of time, and support. -->IF ever there's a person who'll find this system interesting and willing to continue the existing work, Please feel free and safe to modify the existing work BUT never forget to give a proper credit to the original discoverer or developer. I am hoping to see people who'll continue this job. Thanks.</p>
<br />
<p>Introduction</p>
<p>--------------------------------------</p>
<p>Aeon Project (aeon schedule management system) former Clockwork Scheduling System is a free open sourced (also a failure) Schedule Management System made primarily for Cebu Technological University of Tuburan, this system aims to help and provide ease to schedulers who uses the old and complex method of scheduling and also students who are eagerly waiting for the schedule to come.</p>
<br />
<p>Changelogs:</p>
<br />
<p>version 2.0.6</p>
<p>	- Improved version checking</p>
<p> - Improved UI</p>
<p>version 2.0.2</p>
<p>	- Implemented delete_ Authorization Role</p>
<p>version 2.0.0-test#4</p>
<p>	- Pagodabox Initial Support (incomplete)</p>
<p>	- Conflict Checker</p>
<p>	- Pagination</p>
<p>	- PDF Converter added</p>
<p>	- Installation Wizard (incomplete)</p>
<p>version 2.0.0-test#3</p>
<p>	- Faster Schedule Table Display</p>
<p>	- OAuth2 Implementation (incomplete)</p>
<p>	- Elevated Authorization Added (incomplete)</p>
<p>	- uses Material Design</p>
<p>	- switched to Laravel 4.2</p>
<p>version 1.2.1</p>
<p>	- (bug) slow querying</p>
<p>	- made using customized Model Controller View Design Pattern</p>
<br />
<br />
<p>To do:</p>
<p>	- Account Settings</p>
<p>	- Updater</p>
<p>	- Installer</p>
<p>	- Table in PDF</p>
<p>	- Units Display (done)</p>
<p>	- Implementation of all Roles</p>
<p>	- Typographic Errors</p>
<p>	- OAuth2</p>
<br />
<p>Future Plan:</p>
<p>	- base schedules on timestamps in order to separate old schedules from new.</p>
<p>	- AJAX implementation</p>
<p>	- chat server</p>
<p>	- notifications</p>
<br />
<br />
<p>Info:</p>
<br />
<p>/app/src/Aeon 						- Contains the codes made by me. </p>
<p>/app/src/Aeon/Library/Chronos/ 		- Contains the codes responsible for Scheduling and Time Value</p>
<p>/app/src/Aeon/Library/Chameleon.php - Theming (-started only 1%)</p>
<p>/app/src/Repository/ 				- Contains the Files that acts as a storage</p>
<p>/app/src/Transformer/				- Contains the Files that transforms the data given by our Repo</p>





@stop