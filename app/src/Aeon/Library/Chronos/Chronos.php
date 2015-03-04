<?php namespace Aeon\Library\Chronos;

class Chronos
{

	const MIDDAY 	= 12;

	const MIDNIGHT 	= 24;

	protected $timeSettings;

	protected $timeArray;

	public function getTimeSettings()
	{
		$this->check();
		return $this->getTime();
	}

	public function check()
	{
		$this->timeSettings = $this->getTimeFromDatabase();

		if($this->timeSettings == false) 
		{
			$this->timeSettings = $this->getTimeFromConfig();
		}
	}

	/**
	 *	Gets the Starting Time
	 *	@access public
	 *	@return array
	 */
	public function getTimeStart()
	{
		$this->check();
		return [
			'time_start_hour' 	=> $this->timeSettings['time_start_hour'],
			'time_start_minute' => $this->timeSettings['time_start_minute']
		];
	}

	public function getTimeEnd()
	{
		$this->check();
		return [
			'time_end_hour' 	=> $this->timeSettings['time_end_hour'],
			'time_end_minute' => $this->timeSettings['time_end_minute']
		];
	}

	public function getTimeFromConfig()
	{
		$config_all = \Config::get('aeon');

		return [
			'time_start_hour' 	=> $config_all['app_detail']['default_time_start_hour'],
			'time_start_minute' => $config_all['app_detail']['default_time_start_minute'],
			'time_end_hour' 	=> $config_all['app_detail']['default_time_end_hour'],
			'time_end_minute' 	=> $config_all['app_detail']['default_time_end_minute'],
			'time_interval'		=> $config_all['app_detail']['default_time_interval']
		];
	}

	//2
	public function getTimeFromDatabase()
	{
		$config_all = \XConfig::all();
		$config_data_size = count($config_all);
		if($config_data_size < 1) return false;

		// get the last element of our configuration file
		if(!is_null($config_all[$config_data_size - 1]['time_start_hour']) )
		{
			return [
				'time_start_hour' 	=> $config_all[$config_data_size - 1]['time_start_hour'],
				'time_start_minute' => $config_all[$config_data_size - 1]['time_start_minute'],
				'time_end_hour' 	=> $config_all[$config_data_size - 1]['time_end_hour'],
				'time_end_minute' 	=> $config_all[$config_data_size - 1]['time_end_minute'],
				'time_interval' 	=> $config_all[$config_data_size - 1]['time_interval'],
			];
		}
		return false;	
	}

	//stick to the old algorithm
	public function getTime()
	{

		$startingHour 	= $this->timeSettings['time_start_hour'];
		
		$startingMinute = $this->timeSettings['time_start_minute'];

		$endingHour 	= $this->timeSettings['time_end_hour'];

		$endingMinute 	= $this->timeSettings['time_end_minute'];

		$interval 		= $this->timeSettings['time_interval'];

		$fixedTimeline 	= [];

		$timeEvaluator  = $startingHour;

		while($timeEvaluator <= $endingHour)
		{
			if($timeEvaluator < self::MIDDAY)
			{
				array_push($fixedTimeline, ['time_start' => $timeEvaluator.":".$startingMinute." A.M.", 'time_end' => $timeEvaluator.":".$interval." A.M.", 'time_start_hour' => $timeEvaluator, 'time_start_minute' => $startingMinute,'time_interval' => $interval ]);
			}
			elseif($timeEvaluator == self::MIDDAY || $timeEvaluator == self::MIDNIGHT)
			{
				if($timeEvaluator == self::MIDDAY)
				{
					array_push($fixedTimeline, ['time_start' => $timeEvaluator.":".$startingMinute." P.M.", 'time_end' => $timeEvaluator.":".$interval." P.M.", 'time_start_hour' => $timeEvaluator, 'time_start_minute' => $startingMinute,'time_interval' => $interval ]);
				}
				else
				{
					array_push($fixedTimeline, ['time_start' => ($timeEvaluator - self::MIDDAY).":".$startingMinute." A.M.", 'time_end' => ($timeEvaluator - self::MIDDAY).":".$interval." A.M.", 'time_start_hour' => $timeEvaluator, 'time_start_minute' => $startingMinute,'time_interval' => $interval ]);
				}
			}
			else
			{
				array_push($fixedTimeline, ['time_start' => ($timeEvaluator - self::MIDDAY).":".$startingMinute." P.M.", 'time_end' => ($timeEvaluator - self::MIDDAY).":".$interval." P.M.", 'time_start_hour' => $timeEvaluator, 'time_start_minute' => $startingMinute,'time_interval' => $interval ]);	
			}

			$timeEvaluator = $timeEvaluator + 1;
		}

		return $fixedTimeline;
	}

	public static function displayRealTimeRangeVal($hour_in, $minute_in,$hour_out,$minute_out)
	{
		$fixedHourIn = Chronos::fixedHourly($hour_in,$minute_in);
		$fixedHourOut = Chronos::fixedHourly($hour_out,$minute_out);

		return "[{$fixedHourIn}-{$fixedHourOut}]";
	}

	public static function fixedHourly($hour, $minute)
	{
		if($hour < 0) return "TimeError";
		if($minute < 10) $minute = "0".$minute;

		if($hour < 10 && $hour >= 1)
		{
			return "0".$hour.":".$minute." AM";
		}
		elseif($hour <= 12 && $hour >= 10)
		{
			if($hour == 12)
			{
				return $hour.":".$minute." PM";	
			}
			return $hour.":".$minute." AM";
		}
		elseif($hour > 12 && $hour <= 24)
		{
			$hour = $hour - 12;
		
			if($hour == 24)
			{
				return $hour.":".$minute." AM";
			}
			return $hour.":".$minute." PM";
		}
		else
		{
			return "TimeError";
		}
	}
}