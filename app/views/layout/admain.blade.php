<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $short_title }}</title>
        <link rel="stylesheet" href="{{ URL::asset('/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/assets/css/ripples.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/css/font-awesome.css') }}"> 
        <link rel="stylesheet" href="{{ URL::asset('/assets/css/material-wfont.css') }}">
        <link href="{{ URL::asset('/assets/css/dashboard.css') }}" rel="stylesheet">
        <link rel="shortcut icon" href="{{ URL::asset('/assets/img/ico.ico') }}">
        @yield('extra-css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        #floating-action-button .btn {
            margin: 20px;
        }
        #floating-action-button h2 {
            padding: 14px;
            margin: 0;
            font-size: 16px;
            font-weight: 400;
        }

        .btn-customized 
        {
            padding: 1px 5px 1px 5px !important;
            margin: 0 !important;
            border-radius: 14px;
        }
        #toggle-button h2 {
                  font-size: 18.7199993133545px;
                  font-weight: bold;
                  margin-bottom: 30px;
                  margin-top: 50px;
                }
                #toggle-button .togglebutton label {
                  margin: 20px 10px;
                  width: 200px;
                }
                #toggle-button .togglebutton .toggle {
                  float: right;
                }
    </style>
</head>

<body>
 <nav class="navbar navbar-material-purple navbar-fixed-top" role="navigation">
      <div class="container-fluid">
          <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ URL::to('admin') }}"><img src="{{ URL::to('/assets/img/logo.png') }}" width="28px" height="28px">&nbsp;{{ $short_title }}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">{{ Auth::user()->username }}</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="{{ URL::to('logout') }}">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
        @if(Auth::user()->hasRole('global'))
        <ul class="nav nav-sidebar">
            @if(Auth::user()->hasRole('su'))
            <li class="active"><a href="#">Developer's Settings <span class="sr-only">(current)</span></a></li>
            <li><a href="{{ URL::to('admin/config') }}">Configure Behaviour</a></li>
            <li><a href="{{ URL::to('admin/user') }}">Users</a></li>
            @elseif(Auth::user()->hasRole('global'))
            <li class="active"><a href="#">Administrator's Settings <span class="sr-only">(current)</span></a></li>
            <li><a href="{{ URL::to('admin/user') }}">Users</a></li>
            @endif
        </ul>
        @endif
        <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Management <span class="sr-only">(current)</span></a></li>
            <li><a href="{{ URL::to('admin/faculty') }}"><span class="fa fa-users"></span>&nbsp; Faculties</a></li>
            @if(Auth::user()->hasRole('global'))
            <li><a href="{{ URL::to('admin/room') }}"><span class="fa fa-university"></span>&nbsp;Rooms</a></li>
            <li><a href="{{ URL::to('admin/subject') }}"><span class="fa fa-book"></span>&nbsp;Subjects</a></li>
            @endif
            <li><a href="{{ URL::to('admin/schedule') }}"><span class="fa fa-calendar-o"></span>&nbsp;Schedules</a></li>  
        </ul>
        <ul class="nav nav-sidebar">
            <li><a href="{{ URL::to('help') }}"><span class="fa fa-question-circle"></span>&nbsp;Help</a></li>
            <li><a href="{{ URL::to('about') }}"><span class="badge">{{ \Aeon\Aeon::version()->version.".".\Aeon\Aeon::version()->minor_revision.".".\Aeon\Aeon::version()->patch }}</span>&nbsp;About</a></li>
            <li><a href="{{ URL::to('logout') }}"><span class="fa fa-sign-out"></span>&nbsp;Logout</a></li>
        </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
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
                <div id="message_handle" class="panel panel-material-teal">
                <!-- Default panel contents -->
                    <div class="panel-heading">The Schedule Element may be Conflict with the following Elements. Continue?</div>

                     <!-- Table -->
                    <table class="table">
                        <thead>
                            <th>Time-In - Time-Out</th>
                            <th>Day</th>
                            <th>Course</th>
                            <th>Instructor</th>
                            <th>Room</th>
                        </thead>
                        <tbody id="special_message">                    
                            <?php // Session::get('special_message') ?>
                        </tbody>
                    </table>
                    <div class="panel-footer">
                        <a href="#" onclick="forceWrite()" class="btn btn-material-pink">Continue ?</a>
                    </div>
                </div>

                <div id="message_success" class="panel panel-alert">
                <!-- Default panel contents -->
                    <div class="panel-heading">Schedule Created Successfully!</div>

                     <!-- Table -->
                    <table class="table">
                        <tbody id="message_created">                    
                            <?php // Session::get('special_message') ?>
                        </tbody>
                    </table>
                </div>

                <div id="validation_handle" class="panel panel-material-teal">
                <!-- Default panel contents -->
                    <div class="panel-heading">Validation is Required!</div>

                     <!-- Table -->
                    <table class="table">
                       <tbody id="validations">
                           
                       </tbody>
                    </table>
                </div>
            @yield('body')

            <div class="footer">
                <p>&copy; 2014-2015 Aeon Project</p>
            </div>
        </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/assets/js/ripples.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/assets/js/material.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/assets/js/angular.min.js') }}"></script>
    @yield('extra-js')
    <script>
        $(document).ready(function() {
            $("#message_handle").hide();
            $("#message_success").hide();
            $("#validation_handle").hide();
            
            $.material.init();
        });

    </script>
</body>

</html>
