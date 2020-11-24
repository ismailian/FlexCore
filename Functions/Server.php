<?php

namespace App\Functions;

class Server
{

	/**
	 * Parse in the server headers.
	 * @param Bool $keys_only whether to include value or not.
	 * @return Mixed an array of server headers.
	 */
	public static function headers($keys_only = true)
	{
		$output = [];
		$input  = Cleaner::array_remove($_SERVER, "PATH");

		foreach ($input as $key => $value) {
			if ($keys_only) {
				array_push($output, $key);
			}
			array_push($output, array("{$key}" => $value));
		}
	}

	/**
	 * Parse and return a specific server header.
	 * @param String $header_name the server header name.
	 * @return Mixed the value of the header.
	 */
	public static function header($header_name)
	{
		return isset($_SERVER[$header_name]) ? $_SERVER[$header_name] : null;
	}
}
