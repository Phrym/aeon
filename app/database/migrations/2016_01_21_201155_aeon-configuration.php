<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AeonConfiguration extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('sqlite')->create('x1config', function($config){
			$config->increments('id');
			$config->string('short_title');
			$config->string('long_title');
			$config->string('image_path');
			$config->string('shortcut_icon_name');
			$config->string('app_icon_name');
			$config->string('default_user_icon_name');
			$config->string('upload_path');
			$config->integer('time_start')->unsigned()->nullable();
			$config->integer('time_end')->unsigned()->nullable();
			$config->string('campus_director');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('sqlite')->drop('x1config');
	}

}
