<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AeonUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user',function($user) {
			$user->increments('id');
			$user->integer('staff_id')->unsigned()->unique()->nullable();
			$user->foreign('staff_id')->references('id')->on('staff')->onDelete('set null');
			$user->string('username',15)->unique();
			$user->string('password');
			$user->string('ip_addr',12)->nullable();
			$user->dateTime('last_login')->nullable();
			$user->timestamps();
			$user->rememberToken();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user');
	}

}
