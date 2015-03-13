	@extends('layout.admain')

  	@section('extra-css')

	@stop
	@section('body')
	<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <p>You are using Aeon Project v{{ \Aeon\Aeon::version()->version.".".\Aeon\Aeon::version()->minor_revision.".".\Aeon\Aeon::version()->patch }}. [<a href="#">Updater Script Under Development</a>]</p>
    </div>
    <div class="col-md-12">
    	<div class="row">
    		<div class="col-md-4">
    			<a href="{{ URL::to('admin/administrative') }}" class="btn btn-material-lime btn-lg">
        		    <span class="fa fa-university fa-5x"></span>
        		    <p>Administrative Options</p>
    			</a>	
    		</div>
			<div class="col-md-4">
    			<a href="{{ URL::to('admin/staff') }}" class="btn btn-material-pink btn-lg">
        	    	<span class="fa fa-users fa-5x"></span>
        	    	<p>Staff Management Menu</p>
    			</a>		
    		</div>
    		<div class="col-md-4">
    			<a href="{{ URL::to('admin/schedule') }}" class="btn btn-primary btn-lg">
        	    	<span class="fa fa-pencil-square-o fa-5x"></span>
        	    	<p>Schedule Management</p>
    			</a>	
    		</div>    	
    	</div>
    	<div class="row">
    		<div class="col-md-4">
    			<a href="{{ URL::to('admin/help') }}" class="btn btn-material-purple btn-lg">
        		    <span class="fa fa-question fa-5x"></span>
        		    <p>Help</p>
    			</a>
    			<a href="{{ URL::to('admin/account') }}" class="btn btn-material-light-blue btn-lg">
        	    	<span class="fa fa-user fa-5x"></span>
        	    	<p>My Account</p>
    			</a>	
    		</div>
    		<div class="col-md-4">
    			<a href="{{ URL::to('logout') }}" class="btn btn-primary btn-lg">
        	    	<span class="fa fa-pencil-square-o fa-5x"></span>
        	    	<p>Logout</p>
    			</a>	
    		</div>    	
    	</div>
    </div>
	@stop
