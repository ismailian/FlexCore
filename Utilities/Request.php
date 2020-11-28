<?php


namespace Flex\Utilities;

use Flex\Functions\Server;
use Flex\Functions\Cleaner;

class Request
{

  /**
   * Parse the request method.
   * 
   * @return String the request method.
   */
  public static function method()
  {
    return Server::header('REQUEST_METHOD');
  }

  /** 
   * check is request is GET
   * 
   * @param string $route the route to check against.
   * @return bool return true on success, false on failure.
   */
  public static function isGet($route = null)
  {
    if (preg_match("/^(get|GET)$/", Server::header('REQUEST_METHOD')) === 1) {
      if ($route) {
        return (UrlParser::absolutePath() === $route) ? true : false;
      }
      return true;
    }
    return false;
  }

  /** 
   * Check is request is POST
   * 
   * @param string|array $route the route to check against.
   * @return bool return true on success, false on failure.
   */
  public static function isPost($route = null)
  {
    if (preg_match("/^(post|POST)$/", Server::header('REQUEST_METHOD')) === 1) {
      if (UrlParser::absolutePath() === $route) return true;
    }
    return false;
  }


  /**
   * get body content of post request
   * 
   * @return object returns object of post data.
   */
  public static function body()
  {
    return (object) ($_POST);
  }


  /** 
   * Check if post data has an input of given.
   * 
   * @param string $input_name the route to check against.
   * @return bool return true on success, false on failure.
   */
  public static function postHas($input_name)
  {
    return isset($_POST[$input_name]);
  }


  /** 
   * Get all query keys passed to server.
   * 
   * @return array returns an array of all query keys.
   */
  public static function queryKeys()
  {
    return array_keys((array) Request::query());
  }

  /**
   * get all query items as an object.
   * 
   * @return object the query items.
   */
  public static function query()
  {
    $query_json = array();
    $query_segments = explode("&", Server::header('QUERY_STRING'));
    $query_segments = Cleaner::clean_array($query_segments);

    foreach ($query_segments as $fragment) {
      $fragment = explode("=", $fragment);
      $query_json["{$fragment[0]}"] = isset($fragment[1]) ? "{$fragment[1]}" : null;
    }
    return (object) ($query_json);
  }

  /**
   * check if query has an input name.
   * 
   * @param string $input the input name to check for.
   * @return bool return true on success, false on failure.
   */
  public static function queryHas($input)
  {
    return (array_search($input, Request::queryKeys()) !== false) ? true : false;
  }

  /**
   * clean GET and POST super globals
   */
  public static function clear()
  {
    unset($_REQUEST);
  }
}
