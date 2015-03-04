<?php namespace Aeon\Repository;

class DesignationRepository implements DesignationRepositoryInterface
{

	protected $model;

	public function __construct(\Designation $designation)
	{
		$this->model = $designation;
	}

	public function all()
	{
		return $this->model->all();
	}

	public function find($id) 
	{
		return $this->model->find($id);
	}

	public function delete($id) 
	{
		return $this->model->destroy($id);
	}

	public function create(array $input) 
	{
		$validation = \Validator::make($input, \Designation::$rules);
		if($validation->fails()) return $validation;
		
		$designation = new $this->model;
		$designation->designation = \Input::get('designation');
		$designation->save();
	}
}