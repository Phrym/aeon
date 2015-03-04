<?php namespace Aeon\Repository;

class UserRepository implements UserRepositoryInterface
{

	protected $model;

	public function __construct(\User $user)
	{
		$this->model = $user;
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


	public function createOrUpdate(array $input, $id = null) 
	{
		$validation = \Validator::make($input, \User::$rules);
		$user = new $this->model;
		
		if(!is_null($id))
		{
			$user = $this->model->find($id);
			
			if($user->username == Input::get('username') || $user->staff_id == Input::get('staff_id'))
			{
				$validation = \Validator::make($input, [
					'username'   => 'required|min:5',
					'password'   => 'required|alphaNum|min:5|max:15',
	    	        'staff_id'   => 'numeric'
				]);	
			}
			elseif($user->username == Input::get('username'))
			{
				$validation = \Validator::make($input, [
					'username'   => 'required|min:5',
					'password'   => 'required|alphaNum|min:5|max:15',
	    	        'staff_id'   => 'unique:user,staff_id|numeric'
				]);
			}
			else
			{
				$validation = \Validator::make($input, [
					'username'   => 'required|unique:user,username|min:5',
					'password'   => 'required|alphaNum|min:5|max:15',
	    	        'staff_id'   => 'numeric'
				]);
			}
		}
		
		if($validation->fails()) return $validation;

		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->staff_id = Input::get('staff_id');
		$user->authorizeUser('basic');
		$user->save();
	}

	public function userSetPerm($id, $permissionLevel)
	{
		$validation = Validator::make($permissionLevel, [
				'permission' => 'required|in:owner,admin,worker,basic'
			]);

		if($validation->fails()) return $validation;
		
		$user = $this->model->find($id);
		//remove existing roles first before updating
		$user->roles()->detach();
		$user->authorizeUser($permissionLevel);
		$user->save();
	}
}