<?php namespace Aeon\Repository;

interface DesignationRepositoryInterface
{
	public function all();

	public function find($id);

	public function delete($id);

	public function create(array $input);

}