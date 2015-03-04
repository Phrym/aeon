<?php namespace Aeon\Repository;

class BachelorRepository implements BachelorRepositoryInterface
{
	protected $model;

	public function __construct(\Bachelor $bachelor)
	{
		$this->model = $bachelor;
	}

	public function all()
	{
		return $this->model->all();
	}

	public function allDistinct()
	{
		return $this->model->groupBy('description')->orderBy('id')->get();
	}

	public function allOfferedCourse()
	{
		return $this->model->where('isOffered', '=', true)->groupBy('description')->get();
	}

	public function find($id) 
	{
		return $this->model->find($id);
	}

	public function delete($id) 
	{
		return $this->model->destroy($id);
	}

	public function createOrUpdate(array $input, $id = null)
	{
		$validation = \Validator::make($input, \Bachelor::$rules);
		
		if($validation->fails()) return $validation;
		
		$bachelor = (is_null($id)) ? new $this->model : $this->model->find($id);
		$bachelor->code 		= \Input::get('code');
		$bachelor->description 	= \Input::get('description');
		$bachelor->section 		= \Input::get('section');
		$bachelor->shift 		= \Input::get('shift');
		$bachelor->year 		= \Input::get('year');
		$bachelor->isOffered 	= (\Input::get('isOffered') == null) ? false : \Input::get('isOffered');
		$bachelor->shift 		= (\Input::get('shift') == null) ? "night" : \Input::get('shift');
		$bachelor->save();
	}
}