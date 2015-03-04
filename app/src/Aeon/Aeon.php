<?php namespace Aeon;

class Aeon 
{
	protected $config;

	protected $data;

	public function __construct(\XConfig $config)
	{
		$this->config = $config;
		$this->getConfig();
	}

	public function setApplicationSetting()
	{
		$data_size = count($this->data);
		return [
			'___id'			=> $this->data[$data_size - 1]['id'],
			'short_title' 	=> $this->data[$data_size - 1]['short_title'],
			'title' 		=> $this->data[$data_size - 1]['long_title'],
			'image_path' 	=> 'assets/'.$this->data[$data_size - 1]['image_path'],
			'short_icon' 	=> 'assets/'.$this->data[$data_size - 1]['image_path'].'/'.$this->data[$data_size - 1]['shortcut_icon_name'],
			'icon' 			=> 'assets/'.$this->data[$data_size - 1]['image_path'].'/'.$this->data[$data_size - 1]['app_icon_name'],
			'staff_icon' 	=> 'assets/'.$this->data[$data_size - 1]['image_path'].'/'.$this->data[$data_size - 1]['default_user_icon_name'],
			'upload_path' 	=> 'assets/'.$this->data[$data_size - 1]['upload_path'],
			'campus_director' => $this->data[$data_size - 1]['campus_director']
		];
	}
	
	public function getVersionInformation()
	{
		return \Config::get('aeon.app_detail');
	}

	public function getConfig()
	{
		$this->data = $this->config->all();
	}
}