@extends('layout.admain')

@section('extra-css')
@stop

@section('body')
  <h2>Scheduling for {{ $schedules->code." - ".$schedules->year." ".$schedules->section }}
      <small>[<a href="{{ URL::to('admin/schedule/verify?courses='.$schedules->id) }}">back to schedule table</a>]</small></h2>
  <hr />
 {{ Input::get('room_id') }}
  {{ Form::open(['id' => 'scheduleForm', 'name' => 'scheduleForm']) }}
    @foreach ($errors->all() as $message)
        <div class="alert alert-warning"> 
            <p>{{ $message }}</p>
        </div>
    @endforeach
    <?php // get all course, faculty, and room related to this object ?>
    <div class="col-md-12">
      <p>Shift: {{ ucfirst( $schedules->shift ) }}</p>
      <div class="row">
        <div class="col-md-2">
          <label for="faculty">Instructor: </label>
        </div>
        <div class="col-md-7">
          <select class="form-control" name="faculty_id">
          <option>Select Instructor...</option>
          @foreach($faculty as $f)
           <?php $staff = Staff::find($f->staff_id) ?>
           <option value="{{ $f->id }}">{{ $staff->first_name." ".$staff->middle_name." ".$staff->last_name }}</option>
          @endforeach
          </select>    
        </div>  
      </div>
      <div class="row">
        <div class="col-md-2">
          <label for="prospectus_id">Subject: </label>
        </div>
        <div class="col-md-7">
         {{ Form::select('prospectus_id', $subject, '',['class' => 'form-control']) }}
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
          <label for="room_id">Room: </label>
        </div>
        <div class="col-md-7">
         {{ Form::select('room_id', $room, '',['class' => 'form-control']) }}
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
          <label for="day_id">Day: </label>    
        </div>
        <div class="col-md-7">
          {{ Form::select('day_id', $day, '',['class' => 'form-control']) }}    
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
        <h3 align="center"><b>Please Follow 24 Hours Time Mode, Otherwise the Table will never display the schedule correctly.</b></h3>          
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
        <label for="time_in">Time In:</label>
        </div>
        <div class="col-md-10">
          <div class="col-md-1">
            <b>Hours</b>
          </div>
          <div class="col-md-2">
          {{ Form::select('time_in_hour',[
            1 => '1 AM',
            2 => '2 AM',
            3 => '3 AM',
            4 => '4 AM',
            5 => '5 AM',
            6 => '6 AM',
            7 => '7 AM',
            8 => '8 AM',
            9 => '9 AM',
            10 => '10 AM',
            11 => '11 AM',
            12 => '12 PM',
            13 => '1 PM',
            14 => '2 PM',
            15 => '3 PM',
            16 => '4 PM',
            17 => '5 PM',
            18 => '6 PM',
            19 => '7 PM',
            20 => '8 PM',
            21 => '9 PM',
            22 => '10 PM',
            23 => '11 PM',
            24 => '12 AM'
          ],  7, ['class' => 'form-control', 'id' => 'timeInHour', 'onChange' => 'changeTimeOut()']) }}
          </div>
          <div class="col-md-1">
            <b>Minutes</b>
          </div>
          <div class="col-md-2">
            {{ Form::selectRange('time_in_minute', 00, 59, 00, ['class' => 'form-control', 'placeholder' => 'Minutes (MM)']) }}
          </div>    
        </div>
      </div>    
      <div class="row">
        <div class="col-md-2">
          <label for="time_out">Time Out:</label>    
        </div>
        <div class="col-md-10">
          <div class="col-md-1">
            <b>Hours</b>
          </div>
          <div class="col-md-2">
            {{ Form::select('time_out_hour', [
            1 => '1 AM',
            2 => '2 AM',
            3 => '3 AM',
            4 => '4 AM',
            5 => '5 AM',
            6 => '6 AM',
            7 => '7 AM',
            8 => '8 AM',
            9 => '9 AM',
            10 => '10 AM',
            11 => '11 AM',
            12 => '12 PM',
            13 => '1 PM',
            14 => '2 PM',
            15 => '3 PM',
            16 => '4 PM',
            17 => '5 PM',
            18 => '6 PM',
            19 => '7 PM',
            20 => '8 PM',
            21 => '9 PM',
            22 => '10 PM',
            23 => '11 PM',
            24 => '12 AM'
          ],  7, ['class' => 'form-control', 'id' => 'timeOutHour', 'onchange' => 'changeEval()']) }}
          </div>
          <div class="col-md-1">
            <b>Minutes</b>
          </div>
          <div class="col-md-2">
            {{ Form::selectRange('time_out_minute', 00, 59, 59, ['class' => 'form-control', 'placeholder' => 'Minutes (MM)']) }}
          </div>
        </div>
      </div>    
    {{ Form::submit('Submit', ['class' => ' btn btn-success']) }}
    </div>
    
  {{ Form::close() }}
@stop

@section('extra-js')
<script type="text/javascript">
  $(function() {
     $("#scheduleForm").submit(function(e) {
        //prevent Default functionality
        e.preventDefault();

           $.ajax({
          url: "{{ URL::to('admin/schedule/eval/'.$id) }}",
          type: 'post',
          data: $("#scheduleForm").serialize(),
          success: function(data) {
                
                if(data.status == 1 )
                {
                  $("#message_success").hide();
                  $("#message_handle").hide();
                  $("#validation_handle").show();
                  $("#validations").empty();
                  $("#validations").append(data.content);
                }
                else if(data.status == 0)
                {
                  $("#message_success").hide();
                  $("#validation_handle").hide();
                  $("#message_handle").show();
                  $("#special_message").empty();
                  $("#special_message").append(data.content);
                }
                  $("#message_success").show();
                  $("#validation_handle").hide();
                  $("#message_handle").hide();
                  $("#message_created").empty();
                  $("#message_created").append("tr><td>Schedule Element Successfully Created!</td></tr>");

           }});
     
      });
    });
  
      function forceWrite()
      { 
        $.ajax({
          url: "{{ URL::to('admin/schedule/force/'.$id) }}",
          type: 'post',
          data: $("#scheduleForm").serialize(),
          success: function(data) 
          {
            if(data.status == 1)
            {
              $("#message_handle").hide();
              $("#validation_handle").show();
              $("#validations").empty();
              $("#validations").append(data.content);
            }
            else
            {
              $("#message_success").show();
              $("#validation_handle").hide();
              $("#message_handle").hide();
              $("#message_created").empty();
              $("#message_created").append("tr><td>Schedule Element Successfully Created!</td></tr>");
            }
          }});
      }

      function changeTimeOut()
      {
        $("#timeOutHour").val($("#timeInHour").val());
      }

      function changeEval()
      {
        var timeout = $("#timeOutHour").val();
        var timein  = $("#timeInHour").val();

        if(timeout < timein)
        {
          alert("Time Out Cannot be less than the Time In");
          changeTimeOut();
        }
      }

</script>
@stop