<?php

use \Aeon\Library\Chronos\Repository\ChronosRepositoryInterface as Chronosphere;
use \Aeon\Library\Chronos\Chronos;
use \Aeon\Aeon;

class PlotterController extends Admin
{
	protected $app;

	protected $storage;

	protected $transformer;

	protected $data;

	protected $facultyContainer;

	protected $config;

	public function __construct(Aeon $app, Chronosphere $chronos, \Faculty $f)
	{
		parent::__construct();
		$this->app = $app;
		$this->storage = $chronos;
		$this->data = $this->app->setApplicationSetting();
		$this->facultyContainer = $f;
		$this->data['days'] = Day::orderBy('count')->get();
		$this->data['courses'] = [null => 'Make Schedule For...'] + 
													\Bachelor::where('isOffered', '=', true)->select(DB::raw('concat(concat(code, "-",year), " ",section) as curriculum, id'))
															->groupBy('curriculum')
															->lists('curriculum','id');
	}

 	public function getIndex()
 	{
 		return Response::make( View::make('admin.schedule_index', $this->data) , 200);
 	}

 	public function getVerify()
 	{	
 		$course = Input::get('courses');
 		
 		if(Bachelor::find($course))
 		{

	 		$chronos = new \Aeon\Library\Chronos\Chronos;
 			$this->data['curriculum'] 		= Bachelor::find(Input::get('courses'));
 			$this->data['scheduleBundle'] 	= $chronos->getTimeSettings();
 			$this->data['time_start'] 		= $chronos->getTimeStart();
 			$this->data['time_end'] 		= $chronos->getTimeEnd();
 			$this->data['schedules'] 		= $this->storage->findByBachelorId(Input::get('courses'));

 			return Response::make( View::make('admin.scheduler', $this->data), 200);
 		}
 		else
 		{
 			return Response::make(View::make('error.404', $this->data), 404);
 		}

 	}

 	public function getVerified($id)
 	{ 	
 		$this->data['id']			= $id;
 		$this->data['day'] 			= \Day::orderBy('count')->lists('day','id');
 		$this->data['subject'] 		= [null => 'Select Subject...'] + \Prospectus::where('bachelor_id', '=', $id)->lists('description','id');
 		$this->data['room'] 		= [null => 'Select Room...'] + \Room::lists('description', 'id');
 		$this->data['faculty'] 		= $this->facultyContainer->all(); 
 		$this->data['schedules'] 	= \Bachelor::find($id);
 		return Response::make(View::make('admin.schedule_make',$this->data)->withInputs(Input::all()), 200);
 	}

 	public function postVerified($id)
 	{
 		$notCreated = $this->storage->createOrUpdate(Input::all(), $id);

 		// Status #1 is for validation
 		if($notCreated['status'] == 1)
 		{
		 	return Redirect::to('admin/schedule/verified/'.$id)->withErrors($notCreated['content']); 		
 		}
 		elseif($notCreated['status'] == 0)
 		{
 			$message = "";
 			foreach ($notCreated['content'] as $value) 
 			{
 				$message .= "<tr>";
 				$message .= "<td>".Chronos::displayRealTimeRangeVal($value['time_in_hour'],$value['time_in_minute'],$value['time_out_hour'],$value['time_out_minute'])."</td>";
 				$message .= "<td>".Day::find($value['day_id'])['abbreviation']."</td>";
 				$message .= "<td>{$value['bachelor']['code']}-{$value['bachelor']['year']}{$value['bachelor']['section']}</td>";
 				$message .= "<td>{$value['faculty']['staff']['last_name']}, {$value['faculty']['staff']['first_name']}</td>";
 				$message .= "<td>{$value['room']['code']}</td>";
 				$message .= "</tr>";
 			}
 			return Redirect::to('admin/schedule/verified/'.$id)->with('special_message',$message)->withInputs(Input::all());
 		}
		
		return Redirect::to('admin/schedule/verified/'.$id)->with('success_message','Your Schedule was Updated!');
 	}

 	public function postForce($id)
 	{
 		$notCreated = $this->storage->createOrUpdateForce(Input::all(), $id);

 		// Status #1 is for validation
 		if($notCreated['status'] == 1)
 		{
 			$return['status'] = $notCreated['status'];
		 	return $return; 		
 		}

		$return['status'] = 2;
		return $return;
 	}

 	public function postEval($id)
 	{

 		$input = Input::all();
		$return = [];
		$chronos = new \Aeon\Library\Chronos\Chronos;
 		$validation = \Validator::make($input, [
 				'time_in_hour' 		=> 'required|numeric|max:24',
 				'time_out_hour' 	=> 'required|numeric|max:24',
 				'time_in_minute'	=> 'required|numeric|max:59',
 				'time_out_minute'	=> 'required|numeric|max:59',
 				'faculty_id'		=> 'required',
 				'prospectus_id'		=> 'required',
 				'room_id'			=> 'required',
 				'day_id'			=> 'required'
 			]);

 		if($validation->fails())
 		{
 			$return['status'] = 1;  
 			$return['content'] = "";
 			foreach ($validation->errors()->all() as $value) 
 			{
 				$return['content'] .= "<tr>";
 				$return['content'] .= "<td>$value</td>";
 				$return['content'] .= "</tr>"; 		
 			} 
 			return $return;	
 		} 
 		else
 		{
			//  Checks if there's a conflict in schedule.
 			$checker = \Timeplot::where(function($q)
 			{
 				$q->where("day_id","=",\Input::get('day_id'))
  				  ->whereRaw(\Input::get('time_in_hour')." between time_in_hour and time_out_hour")
 				  ->whereRaw(\Input::get('time_out_hour')." between time_in_hour and time_out_hour")
 				  ->where("faculty_id", "=", \Input::get('faculty_id'));
 			})->orWhere(function($q){
				$q->where("day_id","=",\Input::get('day_id'))
				  ->whereRaw(\Input::get('time_in_hour')." between time_in_hour and time_out_hour")
 				  ->whereRaw(\Input::get('time_out_hour')." between time_in_hour and time_out_hour")
 				  ->Where("room_id", "=", \Input::get('room_id'));
 			})->get();

 			if(count($checker) > 0) 
 			{
 				$return['status'] = 0;  
 				$message = "";
	 			foreach ($checker as $value) 
 				{
 					$message .= "<tr>";
 					$message .= "<td>".Chronos::displayRealTimeRangeVal($value['time_in_hour'],$value['time_in_minute'],$value['time_out_hour'],$value['time_out_minute'])."</td>";
 					$message .= "<td>".Day::find($value['day_id'])['abbreviation']."</td>";
 					$message .= "<td>{$value['bachelor']['code']}-{$value['bachelor']['year']}{$value['bachelor']['section']}</td>";
 					$message .= "<td>{$value['faculty']['staff']['last_name']}, {$value['faculty']['staff']['first_name']}</td>";
 					$message .= "<td>{$value['room']['code']}</td>";
 					$message .= "</tr>";
 					
 					$message .= "<input type='hidden' id='time_in_hour' value=".$value['time_in_hour'].">";
 					$message .= "<input type='hidden' id='time_in_minute' value=".$value['time_in_minute'].">";
 					$message .= "<input type='hidden' id='time_out_hour' value=".$value['time_out_hour'].">";
 					$message .= "<input type='hidden' id='time_out_minute' value=".$value['time_out_minute'].">";
 					$message .= "<input type='hidden' id='day_id' value=".$value['day_id'].">";
 					$message .= "<input type='hidden' id='bachelor_id' value=".$value['bachelor_id'].">";
 					$message .= "<input type='hidden' id='faculty_id' value=".$value['faculty_id'].">";
 					$message .= "<input type='hidden' id='room_id' value=".$value['room_id'].">";
 				}
 				$return['content'] = $message;
 				return $return;
 			}
	
 		}
 		
 		$notCreated = $this->storage->createOrUpdateForce(Input::all(), $id);
 		return "Success:Success";

 	}


 	public function postClear()
 	{
 		// only owner can access
 		// drop timeplot table
 	}

 	public function getDeleteschedule($id)
 	{
 		$schedule = $this->storage->find($id);
 		if($schedule)
 		{
 			$schedule->delete($id);
 			return Redirect::to('admin/schedule')->with('success_message', 'Schedule Element Successfully Deleted!');
 		}
		return Redirect::to('admin/schedule')->with('error_message', 'Schedule Element Not Found');
 	}

 	public function getTopdf($id)
 	{
 	//	$course = Input::get('courses');

 		if(Bachelor::find($id))
 		{

	 		$chronos = new \Aeon\Library\Chronos\Chronos;
 			$curriculum 		= Bachelor::find($id);
 			$scheduleBundle 	= $chronos->getTimeSettings();
 			$time_start 		= $chronos->getTimeStart();
 			$time_end 			= $chronos->getTimeEnd();
 			$schedules 			= $this->storage->findByBachelorId($id);

 			$readyToPrint = $this->app->PDFScheduleDesigner($schedules);
 			
 			return PDF::load($readyToPrint, 'A4', 'portrait')->show();
 		}
 		else
 		{
 			return Response::make(View::make('error.404', $this->data), 404);
 		}
 	}

 	public function getSearch($query)
 	{
 		$result = Bachelor::where("isOffered", "=", 1)->where(function($q) use ($query)
 		{
 			$q->orWhere("code", "like", "%$query%")
 			  ->orWhere("description", "like", "%$query%")
 			  ->orWhere("year", "like", "%query")
 			  ->orWhere("section", "like", "%$query%")
 			  ->orWhere("shift", "like", "%$query%");
 		});

 	}
}
