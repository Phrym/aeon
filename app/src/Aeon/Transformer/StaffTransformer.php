<?php namespace Aeon\Transformer;

class StaffTransformer extends Transformer
{
	public function transform($staff)
	{
		return [
			'_id' => $staff['id'],
			'username' => $staff['user']['username'],
			'firstname' => $staff['first_name'],
			'middlename' => $staff['middle_name'],
			'lastname' => $staff['last_name'],
			'gender' => $staff['gender'],
			'email'	=> $staff['email'],
			'image' => $staff['profile_photo'],
			'bachelor_degree' => $staff['bachelor']['code'],
			'bachelor_degree_description' => $staff['bachelor']['description'],
			'master_degree' => $staff['masteral']['code'],
			'master_degree_description' => $staff['masteral']['description'],
			'doctor_degree' => $staff['doctor']['code'],
		    'doctor_degree_description' => $staff['doctor']['description'],
			'minor' => $staff['minor'],
			'major' => $staff['major'],
			'status' => $staff['status']['status'],
			'designation' => $staff['designation']['designation']
		];
	}
}