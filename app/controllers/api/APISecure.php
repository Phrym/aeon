<?php

use Aeon\Aeon;

class APISecure extends \BaseController
{

	protected $httpStatusCode = 200;

	public function __construct()
	{
		
	}

	public function sethttpStatusCode($status)
	{
		$this->httpStatusCode = $status;
		return $this;
	}


	public function gethttpStatusCode()
	{
		return $this->httpStatusCode;
	}

	public function responseWithHttpNotFound($message = 'Cannot Find Resource')
	{
		return $this->sethttpStatusCode(404)->response([
			'message' => $message,
			'status' => $this->gethttpStatusCode() 
		]);
	}

	public function responseWithHttpCreated($data = null, $message = 'Successfully Created!')
	{
		return $this->sethttpStatusCode(201)->response([
			'data' => $data,
			'message' => $message,
			'status' => $this->gethttpStatusCode() 
		]);
	}

	public function responsewithHttpOK()
	{

	}

	public function response($data)
	{
		return Response::json($data, $this->gethttpStatusCode());
	}
}

