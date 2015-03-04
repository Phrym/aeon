<?php namespace Aeon\Repository;

class FacultyRepository implements FacultyRepositoryInterface
{

	protected $model;

	public function __construct(\Faculty $faculty)
	{
		$this->model = $faculty;
	}

	public function all()
	{
		return $this->model->with('Staff')
						   ->with('Staff.Bachelor')
						   ->with('Staff.Status')
						   ->with('Staff.Designation')
						   ->with('Staff.Masteral')
						   ->with('Staff.Doctor')
						   ->get();
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
		$validation = \Validator::make($input, \Faculty::$rules);
		if($validation->fails()) return $validation;
		
		$faculty = new $this->model;
		$faculty->staff_id = \Input::get('staff_id');
		$faculty->save();
	}
}