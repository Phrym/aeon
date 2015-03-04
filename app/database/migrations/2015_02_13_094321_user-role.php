<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserRole extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_role', function($item)
		{
			$item->increments('id')->unsigned();
			$item->integer('user_id')->unsigned();
			$item->foreign('user_id')->references('id')->on('user');
			$item->integer('role_id')->unsigned();
			$item->foreign('role_id')->references('id')->on('role');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_role');
	}

}
