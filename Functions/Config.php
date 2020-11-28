<?php

namespace Flex\Functions;

class Config
{
	/**
	 * Load in config data.
	 * @return Mixed elements in config file.
	 */
	private static function load()
	{
		$config = json_decode(file_get_contents(CONFIG . 'app.json'));
		return $config;
	}

	/**
	 * Get config elements by ParentNode
	 * @param String $name the name of the parent node.
	 * @return Mixed|False elements of the required node.
	 */
	public static function __CallStatic($name, $args)
	{
		if (isset(Config::load()->{$name})) {
			return Config::load()->{$name};
		}
		return false;
	}
}
