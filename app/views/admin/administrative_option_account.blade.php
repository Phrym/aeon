@extends('layout.admain')
@section('extra-css')

@stop
@section('body')
<h2 align="center">Administrative Options</h2>
<div class="col-md-12">
    <div class="col-md-6">
        <h3>Staff Related Functions</h3>
        <a href="{{ URL::to('admin/designation') }}" class="btn btn-material-teal btn-lg">
            <span class="fa fa-university fa-5x"></span>
            <p>Administrative Designation</p>
        </a>
    </div>
    <div class="col-md-6">
        
    </div>
</div>
@stop