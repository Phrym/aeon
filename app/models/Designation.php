<?php

class Designation extends Eloquent
{
	public static $rules = [
		'designation' => 'required|alpha_spaces|min:5'
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'designation';

	public $timestamps = false;

}
