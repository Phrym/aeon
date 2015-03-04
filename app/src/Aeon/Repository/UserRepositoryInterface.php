<?php namespace Aeon\Repository;

interface UserRepositoryInterface
{
	public function all();

	public function find($id);

	public function delete($id);

	public function createOrUpdate(array $input, $id = null);

	public function userSetPerm($id, $permissionLevel);
}