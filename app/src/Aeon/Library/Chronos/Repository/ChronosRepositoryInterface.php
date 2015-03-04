<?php namespace Aeon\Library\Chronos\Repository;

interface ChronosRepositoryInterface
{
	public function all();

	public function find($id);

	public function delete($id);

	public function findByBachelorId($id);

	public function createOrUpdate(array $input, $bachelor_id, $id = null);
	
	public function createOrUpdateForce(array $input, $bachelor_id, $id = null);
}