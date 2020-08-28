<?php

class Config
{

	## load config file ##
	private static function load()
	{
		$config = json_decode(file_get_contents(CONFIG . 'app.json'));
		return $config;
	}

	## static call method ##
	public static function __CallStatic($name, $args)
	{
		if (isset(Config::load()->{$name})) {
			return Config::load()->{$name};
		}
		return false;
	}
}
