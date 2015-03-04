<?php namespace Aeon\Library\Chronos\Transformer;

class ChronosTransformer extends Transformer
{
	public function transform($bachelor)
	{
		return [
			'_id' => $bachelor['id'],
			'course' => $bachelor['code'],
			'description' => $bachelor['description'],
			'year' => (int) $bachelor['year'],
			'offered' => (bool) $bachelor['isOffered']
		];
	}
}