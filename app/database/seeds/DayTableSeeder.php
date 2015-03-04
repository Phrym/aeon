<?php

class DayTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('day')->delete();
		
		Day::create(array(
			'abbreviation' 	=> 'MON',
			'day'			=> 'Monday',
			'count'			=> 1
		));
		Day::create(array(
			'abbreviation' 	=> 'TUE',
			'day'			=> 'Tuesday',
			'count'			=> 2
		));
		Day::create(array(
			'abbreviation' 	=> 'WED',
			'day'			=> 'Wednesday',
			'count'			=> 3
		));
		Day::create(array(
			'abbreviation' 	=> 'THU',
			'day'			=> 'Thursday',
			'count'			=> 4
		));
		Day::create(array(
			'abbreviation' 	=> 'FRI',
			'day'			=> 'Friday',
			'count'			=> 5
		));
		Day::create(array(
			'abbreviation' 	=> 'SAT',
			'day'			=> 'Saturday',
			'count'			=> 6
		));
		Day::create(array(
			'abbreviation' 	=> 'SUN',
			'day'			=> 'Sunday',
			'count'			=> 7
		));
	}

}
