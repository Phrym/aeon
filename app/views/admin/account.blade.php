@extends('layout.admain')

@section('body')
    @if($item['firstname'])

        <center>
            <a href="{{ URL::to('admin/staff') }}" class="btn btn-material-teal">Back to Staffs</a> 
            <a href="{{ URL::to('admin/faculty') }}" class="btn btn-material-teal">Back to Faculties</a>
        </center>
        <div class="jumbotron">
            <h1 align="center">{{ $item['firstname'].' '.$item['middlename'].' '.$item['lastname'] }} <small><a href="{{URL::to('admin/staff').'/'.$item['_id'].'/edit'}}"><span class="fa fa-pencil-square-o"></span></a></small></h1>
                <p align="center">{{ $item['bachelor_degree_description']}} <br /> {{ $item['email'] }}</p>
                <p align="center">{{ $item['designation'].' : '. $item['status'] }}</p>
        </div>
    @else
        <h3>Account is not linked yet. [<a href="{{ URL::to('admin/edit') }}">link me to staff</a>]</h3>
    @endif
@stop