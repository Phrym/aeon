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

	//
	//	From version 2.1.1
	public static function version()
	{
		if(file_get_contents('version.json')) {
			$version = file_get_contents('version.json');
			$version = json_decode($version);		
			return $version;
		}	
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

	public static function PDFScheduleDesigner($collection)
	{
		$printPDF = "<html>
 						<head>
	 						
 						</head>
		 				<body>";
 			$printPDF .= "<center>Cebu Technological University</center><br />";
 			$printPDF .= "<center>Tuburan, Cebu</center>";
 				foreach ($collection as $schedule) 
 				{
 					
 					$printPDF .= "<div style=\"margin:5px;\">";
 					$printPDF .= "<b>".\Aeon\Library\Chronos\Chronos::displayRealTimeRangeVal($schedule->time_in_hour,$schedule->time_in_minute,$schedule->time_out_hour,$schedule->time_out_minute)." (".\Day::find($schedule->day_id)->day.") "."</b><br />";
 					$printPDF .= "<small>Instructor: ".$schedule->faculty()->get()->first()->staff()->get()->first()->last_name.", ".$schedule->faculty()->get()->first()->staff()->get()->first()->first_name[0].".";
 					$printPDF .= "<br />Room: ".$schedule->room()->get()->first()->code;
 					$printPDF .= "<br />Subject: ".\Prospectus::find($schedule->prospectus_id)->code;

 					$printPDF .= "</div>";
 				}
 			$printPDF .= "</body>
 			</html>";		

 			return $printPDF;
	}
}