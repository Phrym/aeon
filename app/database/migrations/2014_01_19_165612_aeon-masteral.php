<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AeonMasteral extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('masteral',function($masteral) {
			$masteral->increments('id');
			$masteral->string('code',8);
			$masteral->string('description');
			$masteral->boolean('isOffered');
			$masteral->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('masteral');
	}


}
