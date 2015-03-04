<?php

use \Aeon\Aeon;

class InstallController extends \BaseController
{
	protected $data;

	protected $app;

	protected $config;

	public function __construct(Aeon $app)
	{
		$this->app = $app;
	//	$this->config = $this->app->getAeonConfig();
		$this->data['title'] = "A.P.S.M.S. - Installation Wizard";
		$this->data['dialog'] = "You are Installing Aeon Project Schedule Management System ";
		$this->data['app_info'] = $this->app->getVersionInformation();

	}

	public function getIndex()
	{	
		if(function_exists("mcrypt_encrypt"))
		{
			$this->data['mcrypt_installed']	= true;
		} 
		else
		{
			$this->data['mcrypt_installed'] = false;
		}

		if(function_exists("openssl_encrypt"))
		{
			$this->data['openssl_installed'] = true;
		}
		else
		{
			$this->data['openssl_installed'] = false;
		}

		if(PHP_VERSION >= 5.4)
		{
			$this->data['php5'] = true;
		}
		else
		{
			$this->data['php5'] = false;
		}
		
		return Response::make( View::make('x1install.index',$this->data));
	}

	public function getCheck()
	{
		

		return Response::make( View::make('x1install.check',$this->data) , 200);
	}

	public function getBegin()
	{

	}

	public function postBegin()
	{

	}
	
	public function getFinish()
	{

	}
}