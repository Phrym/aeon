<?php namespace Aeon\Repository;

interface StaffRepositoryInterface
{
	public function all();

	public function find($id);

	public function delete($id);

	public function createOrUpdate(array $input, $id = null);
}