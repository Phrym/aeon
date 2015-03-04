<?php namespace Aeon\Library;

class Chameleon
{

	/**
	 * Path to theming directory
	 *
	 * @access protected
	 */
	protected $theme_path;


	/**
	 * Current theme name
	 *
	 * @access protected
	 */
	protected $current_theme;


	/**
	 * Theme name list
	 *
	 * @access protected
	 */
	protected $theme_list = [];

	public function __construct()
	{
		$this->getThemePath();
		$this->getThemeList();
	}

	public static function getHeader()
	{
		
	}

	public function setTheme()
	{

	}

	public function getTheme()
	{

	}

	public function getCurrentThemeInfo()
	{
		
	}

	/**
	 * Returns the themes path
	 *
	 * @access protected
	 * @return array
	 */
	protected function getThemePath()
	{
		return $this->theme_path = \Config::get('view.paths.theming');
	}

	/**
	 * Returns the list of themes according to their directory
	 *
	 * @access protected
	 * @return array
	 */
	protected function getThemeList()
	{
		return array_except(scandir(\Config::get('view.paths.theming')),[0,1]);
	}
}