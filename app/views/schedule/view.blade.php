@extends('layout.scheduler')

@section('extra-css')
    <link href="{{ URL::asset('assets/css/aeon.css') }}" rel="stylesheet">
@stop

@section('body')
<center>
  <div class="row">
   <div class="col-md-4">
      
   </div>
   <div class="col-md-4">
    <h2>Schedule for {{ $curriculum->code."-".$curriculum->year.$curriculum->section }}</h2>
   </div>
   <div class="col-md-4">
      <a href="{{ URL::to('admin/schedule/topdf/'.$curriculum->id) }}" class="btn btn-material-teal">Print</a>
   </div>   
  </div>
  <div ng-controller="AeonScheduleWidget" class="AeonScheduleWidgetStyleBasic">
    <div class="col-md-2">
    <table width="100%">
      <thead>
        <th>Time Start / Time End</th>
      </thead>
      <tbody>
          @foreach($scheduleBundle as $time)
          <tr class="AeonSideBarHeader">
            <?php // the height of the sidebar is based on the minute interval set in the configuration ?>
            <td><div class="AeonScheduleTableTimeElement" style="height:{{$time['time_interval']}}px">{{ $time['time_start'] .' - '. $time['time_end'] }}</div></td>
          </tr>
          @endforeach
      </tbody> 
    </table>      
    </div>
      <div class="col-md-10">
       @foreach($days as $day)
        <?php $last_row_hour_position = $time_start['time_start_hour']; $last_row_minute_position = $time_start['time_start_minute'] ?>
        <div class="col-md-1 AeonRow">
          <th>{{ $day['day'] }}</th>
          @foreach($schedules as $s)
            @if($s['day_id'] == $day['id'])
              <?php $difference = ($s['time_out_hour'] - $s['time_in_hour']) ?>
              <div class="row AeonElement" style="margin-top:{{ ((($s['time_in_hour'] - $last_row_hour_position) * 59) - $last_row_minute_position) + $s['time_in_minute'] }}px;height:{{ ($difference > 0) ? ($difference * 59) + ($s['time_out_minute'] - $s['time_in_minute']) : $difference + ($s['time_out_minute'] - $s['time_in_minute'])  }}px;background:#00e0e0;border:1px solid;">
                <small><p class="AeonElementText">{{ $s->faculty()->get()->first()->staff()->get()->first()['last_name'].", ".$s->faculty()->get()->first()->staff()->get()->first()['first_name'][0]."." }}</p></small>
                <small><p class="AeonElementText">{{ $s->room()->get()->first()['code'] }}</p></small>
                <small><p class="AeonElementText">{{ Prospectus::find($s->prospectus_id)['code'] }}</p></small>
              </div>
              <?php $last_row_hour_position = $s->time_out_hour ?>
              <?php $last_row_minute_position = $s->time_out_minute ?>     
            @endif
          @endforeach
        </div>
       @endforeach
      </div>
    </div>
</center>

@stop

@section('extra-js')
    
@stop