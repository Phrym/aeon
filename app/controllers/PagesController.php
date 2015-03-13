<?php

use Aeon\Aeon;
use \Aeon\Library\Chronos\Repository\ChronosRepositoryInterface as Chronosphere;

class PagesController extends BaseController {

	protected $data = array();

	protected $storage;

	protected $facultyContainer;

	protected $chronos;

	protected $app;

	public function __construct(Aeon $app, Chronosphere $chronosphere, \Faculty $f,\Aeon\Library\Chronos\Repository\ChronosRepositoryInterface $chronos)
	{
		$this->app = $app;
		$this->data = $app->setApplicationSetting();
		$this->storage = $chronosphere;
		$this->facultyContainer = $f;
		$this->chronos = $chronos;
		//$this->beforeFilter('checkInstallation');
		$this->data['days'] = Day::orderBy('count')->get();
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function getIndex()
	{
		if(Auth::check()) return Redirect::to('admin');
		return Response::make( View::make('index', $this->data) );
	}

	public function getAbout()
	{
	//	Auth::user()->authorizeUser('admin');

		return View::make('about', $this->data);
	}

	public function getHelp()
	{	
		return View::make('help',$this->data);
	}

	public function postLogin()
	{
		$val = Validator::make(Input::all(), [
				'username'   => 'required|min:5',
				'password'   => 'required|alphaNum|min:5',
			]);

		if($val->fails())
		{
			return Redirect::to('index')
				->withErrors($val) 
				->withInput(Input::except('password')); 
		} 
		else 
		{
			$userdata = array(
				'username' 	=> Input::get('username'),
				'password' 	=> Input::get('password')
			);

			if (Auth::attempt($userdata)) 
			{
				return Redirect::intended('admin')->with('success_message', 'Welcome '.  Auth::user()->username. ' !');
			} 
			else 
			{	 	
				return Redirect::to('index')->with('error_message', 'Invalid Login Credential, Please Try Again.');
			}
		}
	}

	public function getSchedule()
	{
		$course = Input::get('courses');
 	
		$this->data['days'] = Day::orderBy('count')->get();
		$this->data['courses'] = \Bachelor::where('isOffered', '=', true)->select(DB::raw('concat(concat(code, "-",year), " ",section) as curriculum, id'))->groupBy('curriculum')->get();	
 		if(Bachelor::find($course))
 		{

	 		$chronos = new \Aeon\Library\Chronos\Chronos;
 			$this->data['curriculum'] 		= Bachelor::find(Input::get('courses'));
 			$this->data['scheduleBundle'] 	= $chronos->getTimeSettings();
 			$this->data['time_start'] 		= $chronos->getTimeStart();
 			$this->data['time_end'] 		= $chronos->getTimeEnd();
 			$this->data['schedules'] 		= $this->storage->findByBachelorId(Input::get('courses'));

 			return Response::make( View::make('schedule.view', $this->data), 200);
 		}
 		else
 		{
			return Response::make( View::make('schedule.index', $this->data), 200);
 		}

	}

	public function getView($id)
	{
		$this->data['id']			= $id;
 		$this->data['day'] 			= \Day::orderBy('count')->lists('day','id');
 		$this->data['subject'] 		= [null => 'Select Subject...'] + \Prospectus::where('bachelor_id', '=', $id)->lists('description','id');
 		$this->data['room'] 		= [null => 'Select Room...'] + \Room::lists('description', 'id');
 		$this->data['faculty'] 		= $this->facultyContainer->all(); 
 		$this->data['schedules'] 	= \Bachelor::find($id);
 		return Response::make(View::make('schedule.view',$this->data)->withInputs(Input::all()), 200);
	}

	public function getTopdf($id)
 	{

 		if(Bachelor::find($id))
 		{

	 		$chronos = new \Aeon\Library\Chronos\Chronos;
 			$curriculum 		= Bachelor::find($id);
 			$scheduleBundle 	= $chronos->getTimeSettings();
 			$time_start 		= $chronos->getTimeStart();
 			$time_end 			= $chronos->getTimeEnd();
 			$schedules 			= $this->chronos->findByBachelorId($id);

 		//	return Response::make( View::make('admin.scheduler', $this->data), 200);
 		

 			$readyToPrint = $this->app->PDFScheduleDesigner($schedules);
 			
 			return PDF::load($readyToPrint, 'A4', 'portrait')->show();
 		}
 		else
 		{
 			return Response::make(View::make('error.404', $this->data), 404);
 		}
 	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('index')->with('success_message', 'Logged Out Successfully!');
	}
}
