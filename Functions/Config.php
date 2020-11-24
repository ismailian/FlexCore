<?php

class Config
{

	/**
	 * a private function that loads in config data.
	 * return mixed Elements in config file.
	 */
	private static function load()
	{
		$config = json_decode(file_get_contents(CONFIG . 'app.json'));
		return $config;
	}

	/**
	 * Get config elements by ParentNode
	 * $name String the name of the parent node.
	 * return child elements of the required element.
	 */
	public static function __CallStatic($name, $args)
	{
		if (isset(Config::load()->{$name})) {
			return Config::load()->{$name};
		}
		return false;
	}
}
