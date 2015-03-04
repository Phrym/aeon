<?php

class Prospectus extends Eloquent
{
	public static $rules = [
		'code' 			=> 'required|max:15',
		'description' 	=> 'required',
		'units'			=> 'numeric|max:16',
		'bachelor_id'	=> 'exists:bachelor,id|required',
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'prospectus';

	public function bachelor()
	{
		return $this->belongsTo('Bachelor');
	}

	public function schedule()
	{
		return $this->hasOne("Timeplot");
	}

}
