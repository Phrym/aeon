<?php

class Timeplot extends Eloquent
{
	public static $rules = [
		
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'timetable';

	public $timestamps = false;

	public function bachelor()
	{
		return $this->belongsTo("Bachelor");
	}

	public function faculty()
	{
		return $this->belongsTo("Faculty");
	}

	public function room()
	{
		return $this->belongsTo("Room");
	}

	public function subject()
	{
		return $this->belongsTo("Prospectus");
	}
}
