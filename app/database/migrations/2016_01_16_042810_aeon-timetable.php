<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AeonTimetable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('timetable', function($timetable)
		{
			$timetable->increments('id');
			$timetable->integer('day_id')->unsigned();
			$timetable->foreign('day_id')->references('id')->on('day');
			$timetable->integer('room_id')->unsigned();
			$timetable->foreign('room_id')->references('id')->on('room');
			$timetable->integer('faculty_id')->unsigned();
			$timetable->foreign('faculty_id')->references('id')->on('faculty');
			$timetable->integer('bachelor_id')->unsigned();
			$timetable->foreign('bachelor_id')->references('id')->on('bachelor');
			$timetable->integer('prospectus_id')->unsigned();
			$timetable->foreign('prospectus_id')->references('id')->on('prospectus');
			$timetable->integer('time_in_hour');
			$timetable->integer('time_in_minute');
			$timetable->integer('time_out_hour');
			$timetable->integer('time_out_minute');
			$timetable->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('timetable');
	}

}
