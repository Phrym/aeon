<?php

class Bachelor extends Eloquent
{
	public static $rules = [
		'code' 			=> 'required',
		'description' 	=> 'required',
		'year'			=> 'numeric|max:9|min:1|required',
		'shift'			=> 'in:morning,night'
	];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'bachelor';

	public function subject()
	{
		return $this->hasMany('Prospectus');
	}

	public function schedule()
	{
		return $this->hasMany('Timeplot');
	}

}
