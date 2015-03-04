<?php namespace Aeon\Transformer;

abstract class Transformer
{

	/**
	*
	* transforms collection of data into more simplier structure 
	* 
	* @param array
	* @access public
	* @return array
	*/
	public function transformCollection(array $items)
	{
		return array_map([$this, 'transform'], $items);
	}

	/**
	*
	* transforms data into more simplier structure 
	* 
	* @param object
	* @access public
	* @return array
	*/
	public abstract function transform($item);
}