<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AeonStaff extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('staff',function($staff) {
			$staff->increments('id')->unsigned();
			$staff->integer('status_id')->unsigned()->nullable();
			$staff->foreign('status_id')->references('id')->on('status')->onDelete('set null');
			$staff->integer('designation_id')->unsigned()->nullable();
			$staff->foreign('designation_id')->references('id')->on('designation')->onDelete('set null');
			$staff->integer('bachelor_id')->unsigned()->nullable();
			$staff->foreign('bachelor_id')->references('id')->on('bachelor')->onDelete('set null');
			$staff->integer('masteral_id')->unsigned()->nullable();
			$staff->foreign('masteral_id')->references('id')->on('masteral')->onDelete('set null');
			$staff->integer('doctor_id')->unsigned()->nullable();
			$staff->foreign('doctor_id')->references('id')->on('doctor')->onDelete('set null');
			$staff->string('first_name',25);
			$staff->string('middle_name',25);
			$staff->string('last_name',25);
			$staff->string('gender',7);
			$staff->string('email',55);
			$staff->string('profile_photo')->nullable();
			$staff->string('major')->nullable();
			$staff->string('minor')->nullable();
			$staff->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('staff');
	}

}
