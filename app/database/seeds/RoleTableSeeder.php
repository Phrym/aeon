<?php

class RoleTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('role')->delete();
		Role::create(array(
			'role' => 'su',
			'description' => 'Application License Owner Flagship'
		));
		Role::create(array(
			'role' => 'delete_user',
			'description' => 'Application License Owner Flagship'
		));     

		Role::create(array(
			'role' => 'edit_user',
			'description' => 'Application License Owner Flagship'
		));     
		
		Role::create(array(
			'role' => 'delete_degree',
			'description' => 'Administrator Flagship'
		));     
		
		Role::create(array(
			'role' => 'delete_staff',
			'description' => 'Administrator Flagship'
		));
        
		Role::create(array(
			'role' => 'delete_room',
			'description' => 'Administrator Flagship'
		));

		Role::create(array(
			'role' => 'delete_subject',
			'description' => 'Administrator Flagship'
		));

		Role::create(array(
			'role' => 'delete_schedule',
			'description' => 'Administrator Flagship'
		));

		Role::create(array(
			'role' => 'edit_degree',
			'description' => 'Administrator Flagship'
		));

		Role::create(array(
			'role' => 'edit_staff',
			'description' => 'Administrator Flagship'
		));

		Role::create(array(
			'role' => 'edit_room',
			'description' => 'Administrator Flagship'
		));

		Role::create(array(
			'role' => 'edit_subject',
			'description' => 'Administrator Flagship'
		));


		Role::create(array(
			'role' => 'create_degree',
			'description' => 'Administrator Flagship'
		));

		Role::create(array(
			'role' => 'create_staff',
			'description' => 'Administrator Flagship'
		));

		Role::create(array(
			'role' => 'create_room',
			'description' => 'Administrator Flagship'
		));

		Role::create(array(
			'role' => 'create_subject',
			'description' => 'Administrator Flagship'
		));

		Role::create(array(
			'role' => 'global',
			'description' => 'Administrator Flagship'
		));

		Role::create(array(
			'role' => 'create_schedule',
			'description' => 'Worker Flagship'
		));

		Role::create(array(
			'role' => 'edit_schedule',
			'description' => 'Worker Flagship'
		));

		Role::create(array(
			'role' => 'delete_faculty',
			'description' => 'Worker Flagship'
		));
		
		Role::create(array(
			'role' => 'edit_faculty',
			'description' => 'Worker Flagship'
		));

		Role::create(array(
			'role' => 'create_faculty',
			'description' => 'Worker Flagship'
		));

		Role::create(array(
			'role' => 'global_view',
			'description' => 'Worker Flagship'
		));

		Role::create(array(
			'role' => 'basic_authentication_access',
			'description' => 'Auth Basic'
		));
	}
}
