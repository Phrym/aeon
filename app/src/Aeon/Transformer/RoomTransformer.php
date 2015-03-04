<?php namespace Aeon\Transformer;

class RoomTransformer extends Transformer
{
	public function transform($room)
	{
		return [
			'_id' => $room['id'],
			'room' => $room['code'],
			'description' => $room['description']
		];
	}
}