<?php

class Staff extends Eloquent
{
	/**
     * The set of rules set in validation
     * 
     * @access public
     * @var array
     */
	public static $rules = array(
			'first_name' 	=> 'required|max:25|alpha_spaces',
			'middle_name' 	=> 'max:25|alpha_spaces',
			'last_name' 	=> 'required|max:25|alpha_spaces',
			'email' 		=> 'required|unique:staff,email|email|max:55',
			'profile_photo' => 'mimes:jpeg,bmp,png,gif',
			'gender' 		=> 'required|in:male,female,humunculus',
			'bachelor_id' 	=> 'required|exists:bachelor,id',
			'status_id'		=> 'required|exists:status,id',
			'designation_id'=> 'required|exists:designation,id'
	);
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'staff';

	public function user()
	{
		return $this->hasOne('User');
	}

	public function faculty()
	{
		return $this->hasOne('Faculty');
	}

	public function bachelor()
	{
		return $this->belongsTo('Bachelor');
	}

	public function masteral()
	{
		return $this->belongsTo('Masteral');
	}

	public function doctor()
	{
		return $this->belongsTo('Doctor');
	}

	public function status()
	{
		return $this->belongsTo('Status');
	}

	public function designation()
	{
		return $this->belongsTo('Designation');
	}


}
