<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AeonDesignation extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('designation', function($designation){
			$designation->increments('id');
			$designation->string('designation', 100);
			$designation->string('remarks');
		//	$designation->integer('access_id')->unsigned()->nullable();
		//	$designation->foreign('access_id')->references('id')->on('access')->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('designation');
	}

}
