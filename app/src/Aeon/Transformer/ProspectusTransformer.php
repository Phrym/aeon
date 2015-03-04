<?php namespace Aeon\Transformer;

class ProspectusTransformer extends Transformer
{
	public function transform($prospectus)
	{
		return [
			'_id' => $prospectus['id'],
			'code' => $prospectus['code'],
			'description' => $prospectus['description'],
			'units' => $prospectus['units'],
			'course' => $prospectus['bachelor']['code']
		];
	}
}