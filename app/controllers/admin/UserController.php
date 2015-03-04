<?php

use \Aeon\Repository\UserRepositoryInterface as Repository;
use \Aeon\Transformer\UserTransformer as Transformer;
use \Aeon\Aeon;

class UserController extends Admin
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

	}

	public function index()
	{
		$this->data['data'] = $this->transformer->transformCollection( $this->storage->all()->toArray() ) ;
		return Response::make( View::make('admin.user_index', $this->data), 200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return Response::make( View::make('admin.user_create', $this->data), 200 );
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$status = $this->storage->create(Input::all());
		
		// tells if our repository returns a validation object
		// if true it means validation failed or error occured
		if($status)
		{
			return Redirect::to('admin/user')
					->withErrors($status)
					->withInput(Input::all());
		}

		return Response::make( View::make('admin.user_index', $this->data)
									->with('success_message', 'New user Object Created Successfully!')
									,201);
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
		return Response::make( View::make('admin.user_view', $this->data), 200);
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
		return Response::make( View::make('admin.user_edit', $this->data), 200);
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
			return Redirect::to('admin/user')
					->withErrors($status)
					->withInput(Input::all());
		}

		return Redirect::to('admin/user')
					->with('success_message', 'User Object Updated Successfully!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->storage->delete($id);

		return Redirect::to('admin/user')
					->with('success_message', 'User Object Deleted Successfully!');
	}

}
