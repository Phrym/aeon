<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->callSeeds();
	}


	protected function callSeeds()
	{
		foreach ($this->seeds() as $value) 
		{
			$this->call("{$value}TableSeeder");
		}
	}

	protected function seeds()
	{
		return ['Bachelor', 'Status', 'Designation', 'Staff', 'Faculty',
				'Room', 'User', 'Day', 'Role'];
	}
}
