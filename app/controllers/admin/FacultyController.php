<?php

use \Aeon\Repository\FacultyRepositoryInterface as Repository;
use \Aeon\Transformer\FacultyTransformer as Transformer;
use \Aeon\Aeon;

class FacultyController extends Admin
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

		$this->data['staff'] =  [null => 'Make Staff a Faculty...'] + \Staff::select(DB::raw('concat (first_name," ",last_name) as full_name,id'))->lists('full_name', 'id');
	}

	public function index()
	{
		
		$paginator = $this->transformer->transformCollection( $this->storage->all()->toArray() );
    	$perPage = 15;   
    	$page = Input::get('page', 1);
    	if ($page > count($paginator) or $page < 1) { $page = 1; }
    	$offset = ($page * $perPage) - $perPage;
    	$articles = array_slice($paginator,$offset,$perPage);
    	$this->data['data'] = Paginator::make($articles, count($paginator), $perPage);

		return Response::make( View::make('admin.faculty_index', $this->data), 200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return Response::make( View::make('admin.faculty_create', $this->data), 200 );
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(Input::get('staff_id'))
		{
			$status = $this->storage->create(Input::all());
		
			// tells if our repository returns a validation object
			// if true it means validation failed or error occured
			if($status)
			{
				return Redirect::to('admin/faculty/create')
						->withErrors($status)
						->withInput(Input::all());
			}

			return Redirect::to('admin/faculty')
						->with('success_message', 'New faculty Object Created Successfully!');		
		}

		return Redirect::to('admin/faculty')
						->with('success_message', 'Cannot Add Blank');		
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
		$this->data['units'] = 0;
		foreach(Faculty::find($id)->schedule()->get() as $f)
		{
			$this->data['units'] += Prospectus::find($f->prospectus_id)->units;
		}

		return Response::make( View::make('admin.faculty_view', $this->data), 200);
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
		return Response::make( View::make('admin.faculty_edit', $this->data), 200);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$status = $this->storage->edit($id, Input::all());

		// tells if our repository returns a validation object
		// if true it means validation failed or error occured
		if($status)
		{
			return Redirect::to('admin/faculty')
					->withErrors($status)
					->withInput(Input::all());
		}

		return Redirect::to('admin/faculty')
					->with('success_message', 'New faculty Object Updated Successfully!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(Auth::user()->hasRole('delete_faculty'))
		{
			$this->storage->delete($id);

			return Redirect::to('admin/faculty')
					->with('success_message', 'Faculty Object Updated Successfully!');	
		}

		return Redirect::to('admin/faculty')
					->with('error_message', 'You are not Authorized to do certain action!');
	}

}
