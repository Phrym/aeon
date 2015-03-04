<?php namespace Aeon\Transformer;

class BachelorTransformer extends Transformer
{
	public function transform($bachelor)
	{
		return [
			'_id' => $bachelor['id'],
			'course' => $bachelor['code'],
			'section' => $bachelor['section'],
			'description' => $bachelor['description'],
			'year' => (int) $bachelor['year'],
			'offered' => (bool) $bachelor['isOffered'],
			'shift' => $bachelor['shift']
		];
	}
}