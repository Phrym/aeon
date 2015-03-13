<?php namespace Aeon\Transformer;

class UserTransformer extends Transformer
{
	public function transform($user)
	{
		return [
			'_id'	=> $user['id'],
			'username' => $user['username'],
			'firstname' => $user['staff']['first_name'],
			'middlename' => $user['staff']['middle_name'],
			'lastname' => $user['staff']['last_name'],
			'gender' => $user['staff']['gender'],
			'email'	=> $user['staff']['email'],
			'image' => $user['staff']['profile_photo'],
			'bachelor_degree' => $user['staff']['bachelor']['code'],
			'bachelor_degree_description' => $user['staff']['bachelor']['description'],
			'master_degree' => $user['staff']['masteral']['code'],
			'master_degree_description' => $user['staff']['masteral']['description'],
			'doctor_degree' => $user['staff']['doctor']['code'],
		    'doctor_degree_description' => $user['staff']['doctor']['description'],
			'status' => $user['staff']['status']['status'],
			'designation' => $user['staff']['designation']['designation'],
			'last_login' => $user['last_login'],
		];
	}
}