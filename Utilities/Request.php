<?php


namespace App\Utilities;

use App\Functions\Server;
use App\Functions\Cleaner;

class Request
{

	/**
	 * Parse the request method.
	 * @return String the request method.
	 */
	public static function method()
	{
		# method #
		return Server::header('REQUEST_METHOD');
	}

	public static function is_get($route = null)
	{
		if (is_null($route)) {

			if (preg_match("/^(get|GET)$/", Server::header('REQUEST_METHOD')) === 1) {

				return true;
			}
			return false;
		}

		if (is_array($route)) {

			## match ##
			if (preg_match("/^(get|GET)$/", Server::header('REQUEST_METHOD')) === 1 && UrlParser::segments() === $route) {

				return true;
			}
			## match ##
		} else {

			## match ##
			if (preg_match("/^(get|GET)$/", Server::header('REQUEST_METHOD')) === 1 && UrlParser::absolutePath() === $route) {

				return true;
			}
			## match ##
		}

		return false;
		# is_get #
	}

	// check is method === post:
	public static function is_post($route = null)
	{
		if (is_null($route)) {

			if (preg_match("/^(post|POST)$/", Server::header('REQUEST_METHOD')) === 1) {

				return true;
			}
			return false;
		}

		if (preg_match("/^(post|POST)$/", Server::header('REQUEST_METHOD')) === 1 && UrlParser::absolutePath() === $route) {
			return true;
		}

		return false;
		# is_post #
	}

	// checks if post has a key:
	public static function post_has($input_name)
	{
		# post_has #
		return isset($_POST[$input_name]);
		# post_has #
	}

	// check if query contains an element:
	public static function query_keys()
	{
		# query_names #
		return array_keys((array) Request::query_as_object());
		# query_names #
	}

	// check if query contains an element:
	public static function query_has($input)
	{
		# query_has #
		return (array_search($input, Request::query_keys()) !== false) ? true : false;
		# query_has #
	}

	// return the request query string:
	public static function query_as_object()
	{
		# query_as_json #
		$query_json = array();

		$query_segments = explode("&", Server::header('QUERY_STRING'));
		$query_segments = Cleaner::clean_array($query_segments);

		foreach ($query_segments as $fragment) {

			$fragment = explode("=", $fragment);

			$query_json["{$fragment[0]}"] = isset($fragment[1]) ? "{$fragment[1]}" : null; //

		}

		return (object) ($query_json);
		# query_as_json #
	}

	/**
	 * Clean GET and POST super globals
	 */
	public static function clear()
	{
		unset($_REQUEST);
	}
}
