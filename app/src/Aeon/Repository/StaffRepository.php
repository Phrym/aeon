<?php namespace Aeon\Repository;

class StaffRepository implements StaffRepositoryInterface
{
	protected $model;

	public function __construct(\Staff $staff)
	{
		$this->model = $staff;
	}

	public function all()
	{
		return $this->model->with('Bachelor')
						   ->with('Status')
						   ->with('Designation')
						   ->with('User')
						   ->with('Masteral')
						   ->with('Doctor')
						   ->get();
	}

	public function findByUser($user)
	{
		return $this->model->where('staff.username', '=', $user)->get();
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
		$validation = \Validator::make($input, \Staff::$rules);
		$staff = new $this->model;
		
		if(!is_null($id))
		{
			$staff = $this->model->find($id);
			
			if($staff->email == Input::get('email'))
			{
				$validation = \Validator::make($input, [					
					'first_name' 	=> 'required|max:25|alpha_spaces',
					'middle_name' 	=> 'max:25|alpha_spaces',
					'last_name' 	=> 'required|max:25|alpha_spaces',
					'email' 		=> 'required|email|max:55',
					'profile_photo' => 'mimes:jpeg,bmp,png,gif',
					'gender' 		=> 'required|in:male,female,humunculus',
					'bachelor_id' 	=> 'required|exists:bachelor,id',
					'status_id'		=> 'required|exists:status,id',
					'designation_id'=> 'required|exists:designation,id'
				]);	
			}
		}

		if($validation->fails()) return $validation;

		$staff->first_name = \Input::get('first_name');
		$staff->middle_name = \Input::get('middle_name');
		$staff->last_name = \Input::get('last_name');
		$staff->gender = \Input::get('gender');
		$staff->email = \Input::get('email');
		$staff->profile_photo = \Input::get('profile_photo');
		$staff->bachelor_id = \Input::get('bachelor_id');
		$staff->masteral_id = \Input::get('masteral_id');
		$staff->doctor_id = \Input::get('doctor_id');
		$staff->status_id = \Input::get('status_id');
		$staff->designation_id = \Input::get('designation_id');
		$staff->major = \Input::get('major');
		$staff->minor = \Input::get('minor');
		$staff->save();
	}
}