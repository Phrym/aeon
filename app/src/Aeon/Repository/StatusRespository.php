<?php namespace Aeon\Repository;

class StatusRepository implements StatusRepositoryInterface
{

	protected $model;

	public function __construct(\Status $status)
	{
		$this->model = $status;
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
		$status = new $this->model;
		$status->status = \Input::get('status');
		$status->save();	
	}
}