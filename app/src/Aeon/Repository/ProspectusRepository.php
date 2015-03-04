<?php namespace Aeon\Repository;

class ProspectusRepository implements ProspectusRepositoryInterface
{

	protected $model;

	public function __construct(\Prospectus $prospectus)
	{
		$this->model = $prospectus;
	}

	public function all()
	{
		return $this->model->with('Bachelor')->get();
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
		$validation = \Validator::make($input, \Prospectus::$rules);
		$prospectus = new $this->model;

		if($validation->fails()) return $validation;
		if(!is_null($id)) $prospectus = $this->model->find($id);

		$prospectus->code = \Input::get('code');
		$prospectus->description = \Input::get('description');
		$prospectus->bachelor_id = \Input::get('bachelor_id');
		$prospectus->units = \Input::get('units');
		$prospectus->save();
	}
}