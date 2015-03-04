<?php

class Faculty extends Eloquent
{

	public static $rules = array(
			'staff_id'		=> 'exists:staff,id|unique:faculty,staff_id',
		);
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'faculty';

	public function staff()
	{
		return $this->belongsTo('Staff');
	}
}
