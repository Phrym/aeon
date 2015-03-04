<?php namespace Aeon\Transformer;

class DesignationTransformer extends Transformer
{
	public function transform($designation)
	{
		return [
			'_id'		  => $designation['id'],
			'designation' => $designation['designation']
		];
	}
}