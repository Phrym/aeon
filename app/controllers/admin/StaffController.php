<?php

use \Aeon\Repository\StaffRepositoryInterface as Repository;
use \Aeon\Transformer\StaffTransformer as Transformer;
use \Aeon\Aeon;

class StaffController extends Admin
{
	protected $app;

	protected $storage;

	protected $transformer;

	protected $data;

	protected $config;

	public function __construct(Repository $Repository, Transformer $Transformer, Aeon $app)
	{
		parent::__construct();
		$this->app = $app;
		$this->data = $this->app->setApplicationSetting();
		$this->storage = $Repository;
		$this->transformer = $Transformer;

		// For Form Select Purposes
		$this->data['course'] = [null => 'Choose Bachelor Course Please...'] + Bachelor::orderBy('description')->lists('description','id');
		$this->data['status'] = [null => 'Choose Status Please...'] + Status::lists('status','id');
		$this->data['designation'] = [null => 'Choose Designation Please...'] + Designation::lists('designation','id');
	}

	public function index()
	{
		$query = Input::get("q");
		$paginator = $this->transformer->transformCollection( $this->storage->all()->toArray() ) ;
		if(isset($query) && !empty($query))
		{
			$splitQuery = preg_split('/\s+/', $query);
			$paginator = $this->transformer->transformCollection( \Staff::with('User')->with('Bachelor')->with('Masteral')->with('Doctor')->with('Status')->with('Designation')->where(function($q) use ($splitQuery){
				foreach ($splitQuery as $value) {
    				$q->orWhere('first_name', 'like', "%{$value}%")
    				  ->orWhere('middle_name', 'like', "%{$value}%")
    				  ->orWhere('last_name', 'like', "%{$value}%")
    				  ->orWhere('gender', 'like', "%{$value}%")
    				  ->orWhere('email', 'like', "%{$value}%");
  				}
			})->get()->toArray());
		}

		
		$perPage = 15;   
    	$page = Input::get('page', 1);
    	if ($page > count($paginator) or $page < 1) { $page = 1; }
    	$offset = ($page * $perPage) - $perPage;
    	$articles = array_slice($paginator,$offset,$perPage);

		$this->data['data'] = Paginator::make($articles, count($paginator), $perPage);

		return Response::make( View::make('admin.staff_index', $this->data), 200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return Response::make( View::make('admin.staff_create', $this->data), 200 );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$status = $this->storage->createOrUpdate(Input::all());
		
		// tells if our repository returns a validation object
		// if true it means validation failed or error occured
		if($status)
		{
			return Redirect::to('admin/staff/create')
					->withErrors($status)
					->withInput(Input::all());
		}

		return Redirect::to('admin/staff')
							->with('success_message', 'New Staff Object Created Successfully!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$this->data['item'] = $this->transformer->transform($this->storage->find($id));
		return Response::make( View::make('admin.staff_view', $this->data), 200);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->data['item'] = $this->transformer->transform($this->storage->find($id));
		return Response::make( View::make('admin.staff_edit', $this->data), 200);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$status = $this->storage->createOrUpdate(Input::all(),$id);

		// tells if our repository returns a validation object
		// if true it means validation failed or error occured
		if($status)
		{
			return Redirect::to('admin/staff/'.$id.'/edit')
					->withErrors($status)
					->withInput(Input::all());
		}

		return Redirect::to('admin/staff')
					->with('success_message', 'Staff Object Updated Successfully!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(Auth::user()->hasRole('delete_staff'))
		{
			$this->storage->delete($id);

			return Redirect::to('admin/staff')
					->with('success_message', 'Staff Object Deleted Successfully!');			
		}

		return Redirect::to('admin/staff')
					->with('error_message', 'You are not Authorized to do certain action!');

	}

}
