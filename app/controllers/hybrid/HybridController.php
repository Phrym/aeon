<?php

use Aeon\Library\Chameleon as Themer;

class HybridController extends Prototype
{

	protected $data = [];

	protected $themeHandler;

	public function __construct(Themer $theme)
	{
		$this->themeHandler = $theme;
		
	}

	public function getIndex()
	{
		$d['title'] = 'Aw';
		return Response::make( View::make('hybrid.index', $d), 200);
	}

	public function getTest()
	{
		$data['title'] = 'Aw';
		return Response::make( View::make('hybrid.test', $data) );
	}
}