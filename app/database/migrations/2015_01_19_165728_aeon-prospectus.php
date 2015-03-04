<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AeonProspectus extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prospectus',function($prospectus) {
			$prospectus->increments('id');
			$prospectus->integer('bachelor_id')->unsigned()->nullable();
			$prospectus->foreign('bachelor_id')->references('id')->on('bachelor')->onDelete('cascade');
			$prospectus->string('code',15);
			$prospectus->string('description');
			$prospectus->integer('units');
			$prospectus->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('prospectus');
	}

}
