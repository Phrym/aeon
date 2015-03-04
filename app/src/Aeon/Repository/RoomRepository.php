<?php namespace Aeon\Repository;

class RoomRepository implements RoomRepositoryInterface
{
	protected $model;

	public function __construct(\Room $room)
	{
		$this->model = $room;
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
		$validation = \Validator::make($input, \Room::$rules);
		if($validation->fails()) return $validation;
		
		$room = new $this->model;
		$room->code = \Input::get('code');
		$room->description = \Input::get('description');
		$room->save();
	}
}