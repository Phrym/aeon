<?php

use \Aeon\Repository\StaffRepositoryInterface as Repository;
use \Aeon\Transformer\StaffTransformer as Transformer;

class StaffAPI extends APISecure {

	protected $storage;

	protected $transformer;

	public function __construct(Repository $repository, Transformer $autobot)
	{
		$this->storage = $repository;
		$this->transformer = $autobot;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->sethttpStatusCode(200)->response( $this->transformer->transformCollection( $this->storage->all()->toArray() ));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
//	public function create() {}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = $this->storage->create(Input::all());
		return $this->responseWithHttpCreated($data['id']);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$content = $this->storage->find($id);
		if(!$content)
		{
			return $this->responseWithHttpNotFound();
		}

		return $this->sethttpStatusCode(200)->response( $this->transformer->transform($this->storage->find($id)) );
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
//	public function edit($id) {}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
	}

}
