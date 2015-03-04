<?php namespace Aeon\Repository;

interface BachelorRepositoryInterface
{
	public function all();

	public function find($id);

	public function delete($id);

	public function allOfferedCourse();

	public function createOrUpdate(array $input, $id = null);
}