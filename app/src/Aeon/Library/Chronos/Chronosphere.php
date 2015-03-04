<?php

use \Aeon\Library\Chronos\Repository\ChronosRepositoryInterface as Repository;
use \Aeon\Library\Chronos\Transformer\ChronosTransformer as Transformer;
use \Aeon\Aeon;

class Chronosphere extends Chronos
{
	protected $app;

	protected $storage;

	protected $transformer;

	public function __construct(Repository $repo, Transformer $tr, Aeon $app)
	{
		$this->app = $app;
		$this->storage = $repo;
		$this->transformer = $tr;
	}

	public function returnSchedule()
	{

	}

}