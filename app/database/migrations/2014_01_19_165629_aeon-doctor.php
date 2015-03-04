<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AeonDoctor extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('doctor',function($doctor) {
			$doctor->increments('id');
			$doctor->string('code',8);
			$doctor->string('description');
			$doctor->boolean('isOffered');
			$doctor->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('doctor');
	}

}
