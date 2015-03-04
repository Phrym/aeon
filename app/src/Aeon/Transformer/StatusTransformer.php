<?php namespace Aeon\Transformer;

class StatusTransformer extends Transformer
{
	public function transform($status)
	{
		return [
			'status' => $status['status'],
			'notes' => $status['remarks']
		];
	}
}