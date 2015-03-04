<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('user')->delete();
		User::create(array(
			'staff_id' => 1,
			'username' => 'admin',
			'password' => Hash::make('password')
		));
	}

}
