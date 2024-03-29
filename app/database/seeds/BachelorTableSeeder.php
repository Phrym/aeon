<?php

class BachelorTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('bachelor')->delete();
		Bachelor::create(array(
			'code' => 'BSICT',
			'description' => 'Bachelor of Science in Information and Communication Technology',
			'isOffered' => true,
			'shift' => 'morning',
			'year' => 2
		));
		Bachelor::create(array(
			'code' => 'BSIT',
			'description' => 'Bachelor of Science in Information Technology',
			'isOffered' => false
		));
		Bachelor::create(array(
			'code' => 'BSCE',
			'description' => 'Bachelor of Science in Computer Engineer',
			'isOffered' => true,
			'year' => 1,
			'shift' => 'morning',
			'section' => 'A'
		));
	}

}
