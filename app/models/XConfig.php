<?php

class XConfig extends Eloquent
{

	/**
	 * The database connection used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'sqlite';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'x1config';

	public static $rules = array(
			'short_title'   => 'required|min:5',
			'long_title'   => 'required|min:5',
	//		'image_path'  => 'required',
	//		'shortcut_icon_name' => 'required',
	//		'app_icon_name' => 'required',
	//		'upload_path' => 'required',
			'campus_director' => 'required'
	);

	public $timestamps = false;
}
