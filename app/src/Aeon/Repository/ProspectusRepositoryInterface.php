<?php namespace Aeon\Repository;

interface ProspectusRepositoryInterface
{
	public function all();

	public function find($id);

	public function delete($id);

	public function createOrUpdate(array $input, $id = null);

}