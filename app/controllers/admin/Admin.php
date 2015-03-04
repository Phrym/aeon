 <?php

use Aeon\Aeon;

class Admin extends \BaseController
{
	protected $configs;

	public function __construct()
	{
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('checkAccess');
	}

	public function missingMethod($params = array())
	{
		//return '404';
		$this->configs = $this->getConfig();
		$data = $this->setApplicationSetting();
		return Response::make( View::make('error', $data), 404);
	}	

	private function setApplicationSetting()
	{
		return [
			'___id'			=> $this->configs[0]['id'],
			'short_title' 	=> $this->configs[0]['short_title'],
			'title' 		=> $this->configs[0]['long_title'],
			'image_path' 	=> 'assets/'.$this->configs[0]['image_path'],
			'short_icon' 	=> 'assets/'.$this->configs[0]['image_path'].'/'.$this->configs[0]['shortcut_icon_name'],
			'icon' 			=> 'assets/'.$this->configs[0]['image_path'].'/'.$this->configs[0]['app_icon_name'],
			'staff_icon' 	=> 'assets/'.$this->configs[0]['image_path'].'/'.$this->configs[0]['default_user_icon_name'],
			'upload_path' 	=> 'assets/'.$this->configs[0]['upload_path'],
			'campus_director' => $this->configs[0]['campus_director']
		];
	}

	private function getConfig()
	{
		return XConfig::all();
	}
}