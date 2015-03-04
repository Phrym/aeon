<?php namespace Aeon\Library\Chronos\Repository;

class ChronosRepository implements ChronosRepositoryInterface
{

	protected $model;

	public function __construct(\Timeplot $timeplot)
	{
		$this->model = $timeplot;
	}

	public function all()
	{
		return $this->model->all();
	}

	public function find($id) 
	{
		return $this->model->find($id);
	}

	public function findByBachelorId($id)
	{
		return \Bachelor::find($id)->schedule()->orderBy('time_in_hour')->get();
	}

	public function delete($id) 
	{
		return $this->model->destroy($id);
	}

	public function createOrUpdate(array $input, $bachelor_id, $id = null)
	{
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
 			$return['content'] = $validation; 
 			return $return;	
 		} 

 		//  Checks if there's a conflict in schedule.
 		$checker = $this->model->where(function($q)
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
 			$return['content'] = $checker; 
 			return $return;
 		}

 		$schedule = (is_null($id)) ? new $this->model : $this->model->find($id);
 			$schedule->bachelor_id 		= $bachelor_id;
 			$schedule->faculty_id 		= \Input::get('faculty_id');
 			$schedule->prospectus_id 	= \Input::get('prospectus_id');
 			$schedule->room_id 			= \Input::get('room_id');
 			$schedule->day_id 			= \Input::get('day_id');
 			$schedule->time_in_hour 	= \Input::get('time_in_hour');
 			$schedule->time_out_minute 	= \Input::get('time_out_minute');
 			$schedule->time_in_minute 	= \Input::get('time_in_minute');
 			$schedule->time_out_hour 	= \Input::get('time_out_hour');
 		$schedule->save();
	}

	public function createOrUpdateForce(array $input, $bachelor_id, $id = null)
	{

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

 		if($validation->fails()) return $validation;

 		$schedule = (is_null($id)) ? new $this->model : $this->model->find($id);
 			$schedule->bachelor_id 		= $bachelor_id;
 			$schedule->faculty_id 		= \Input::get('faculty_id');
 			$schedule->prospectus_id 	= \Input::get('prospectus_id');
 			$schedule->room_id 			= \Input::get('room_id');
 			$schedule->day_id 			= \Input::get('day_id');
 			$schedule->time_in_hour 	= \Input::get('time_in_hour');
 			$schedule->time_out_minute 	= \Input::get('time_out_minute');
 			$schedule->time_in_minute 	= \Input::get('time_in_minute');
 			$schedule->time_out_hour 	= \Input::get('time_out_hour');
 		$schedule->save();
	}
}