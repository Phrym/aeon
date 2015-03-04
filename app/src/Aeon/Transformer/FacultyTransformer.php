<?php namespace Aeon\Transformer;

class FacultyTransformer extends Transformer
{
	public function transform($faculty)
	{
		return [
			'_id' => $faculty['id'],
			'firstname' => $faculty['staff']['first_name'],
			'middlename' => $faculty['staff']['middle_name'],
			'lastname' => $faculty['staff']['last_name'],
			'gender' => $faculty['staff']['gender'],
			'email'	=> $faculty['staff']['email'],
			'image' => $faculty['staff']['profile_photo'],
			'bachelor_degree' => $faculty['staff']['bachelor']['code'],
			'bachelor_degree_description' => $faculty['staff']['bachelor']['description'],
			'master_degree' => $faculty['staff']['masteral']['code'],
			'master_degree_description' => $faculty['staff']['masteral']['description'],
			'doctor_degree' => $faculty['staff']['doctor']['code'],
		    'doctor_degree_description' => $faculty['staff']['doctor']['description'],
			'status' => $faculty['staff']['status']['status'],
			'designation' => $faculty['staff']['designation']['designation']
		];
	}
}