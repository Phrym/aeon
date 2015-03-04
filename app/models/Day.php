<?php

class Day extends Eloquent
{
	protected $table = 'day'; 

	public $timestamps = false;

	public function schedule()
	{
		return $this->belongsTo('Timeplot');
	}

}