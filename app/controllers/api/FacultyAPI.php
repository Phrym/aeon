<?php

use \Aeon\Repository\FacultyRepositoryInterface as Repository;
use \Aeon\Transformer\FacultyTransformer as Transformer;

class FacultyAPI extends APISecure {

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
		return Response::json( $this->transformer->transformCollection( $this->storage->all()->toArray() ) , 200);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		return Response::json( $this->transformer->transform($this->storage->find($id)) , 200);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


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
