<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AeonFaculty extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('faculty', function($faculty)
		{
			$faculty->increments('id')->unsigned();
			$faculty->integer('staff_id')->unsigned();
			$faculty->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
			$faculty->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('faculty');
	}

}
