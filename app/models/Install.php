<?php

class Install extends Eloquent
{

	/**
	 * The database connection used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'installer';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'install';

	public static $rules = [
		
	];

	public $timestamps = false;
}
