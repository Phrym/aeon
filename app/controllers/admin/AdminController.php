<?php

 use \Aeon\Transformer\StaffTransformer as StaffTransformer;

 class AdminController extends Admin
 {

 	protected $app;

 	protected $transformer;

 	protected $data;

 	public function __construct(\Aeon\Aeon $app, StaffTransformer $s)
 	{
 		parent::__construct();
		$this->app = $app;
		$this->transformer = $s;
		$this->data = $this->app->setApplicationSetting();
 	}

 	public function getIndex()
 	{
 		return Response::make( View::make('admin.index', $this->data) , 200);
 	}

 	public function getConfig()
 	{
 		return Response::make( View::make('admin.config', $this->data) , 200);
 	}

 	public function getAdministrative()
 	{
 		return Response::make( View::make('admin.administrative_options', $this->data) , 200);
 	}

 	public function getAccount($name = null)
 	{
 		// returns other user's account information if there's an argument supplied
 		if ( $name != null )
 		{
 			
 		}
 		else
 		{
 			$this->data['item'] = $this->transformer->transform(\Staff::find($name));
 			return Response::make( View::make('admin.account', $this->data), 200);
 		}
 	}

 	public function getEdit()
 	{

 	}
 	
 	public function postConfig()
 	{
 		$val = Validator::make(Input::all(), XConfig::$rules);
 		if($val->fails())
 		{
	 		return Redirect::to('admin/config')
	 				->withErrors($val)
	 				->withInput(Input::all());	
 		}
 		else
 		{
 			$update = XConfig::find($this->data['___id']);
 			$update->short_title = Input::get('short_title');
 			$update->long_title = Input::get('long_title');
 			$update->campus_director = Input::get('campus_director');
 			$update->save();
 			return Redirect::to('admin/config')
 					->with('success_message', 'Application Information Updated Successfully');
 		}
 	}
 }