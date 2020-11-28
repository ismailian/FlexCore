<?php

namespace Flex\Utilities;

use Flex\Functions\Server;
use Flex\Functions\Cleaner;

class UrlParser
{

  /**
   * get the absolute request  Uri.
   * 
   * @return str string containing uri path.
   */
  public static function absolutePath()
  {
    return @urldecode(parse_url(Server::header('REQUEST_URI'), PHP_URL_PATH));
  }


  /**
   * get all Uri Segments as an array.
   * 
   * @return Array Uri Segments.
   */
  public static function segments()
  {
    $uriInfo = @urldecode(parse_url(Server::header('REQUEST_URI'), PHP_URL_PATH));
    return array_merge(array('/'), Cleaner::clean_array(explode('/', $uriInfo)));
  }

  /**
   * check if route is parameterized.
   * 
   * @param string $route the route to check for parameters.
   * @return mixed|bool returns match results if any, otherwise false.
   */
  private static function isParameterized($route)
  {
    return @preg_match('/^.+(?<placeholder>\{(?<keyword>.+)\})(.+)?$/i', $route, $result);
  }


  /**
   * match a pattern in request route.
   * 
   * @param string $route the patten to check for.
   * @return mixed|false returns match results if any, otherwise false.
   */
  public static function match($route)
  {
    if (!static::isParameterized($route)) return;

    @preg_match('/^.+(?<placeholder>\{(?<keyword>.+)\})(.+)?$/i', $route, $placeholder);
    @preg_match('/^(?<name>.+):(?<chars>.+)$/iU', $placeholder['keyword'], $chars);

    $keyword = $placeholder['keyword'];
    $badChars = "[^/\\ ]";

    if (!empty($chars)) {
      $keyword  = $chars['name'];
      $badChars = str_replace(',', '', $chars['chars']);
      $badChars = "[^/\\ {$badChars}]";
    }

    $output = preg_replace("/({$placeholder['placeholder']})/i", "(?<{$keyword}>{$badChars}+)", $placeholder[0]);

    $nextPtr = json_encode($output, JSON_UNESCAPED_SLASHES);
    $nextPtr = str_replace('"', '', $nextPtr);
    $nextPtr = str_replace('/', '\/', $nextPtr);
    $nextPtr = "/^{$nextPtr}(\/?)$/i";

    @preg_match($nextPtr, str_replace('//', '/', UrlParser::absolutePath()), $argument);

    $match = !empty($argument) ? $argument[0] : null;
    $param = !empty($argument) ? $argument[$placeholder['keyword']] : null;

    if (!empty($argument)) {
      return (object)[
        "url"      => $match,
        "$keyword" => $param,
      ];
    }
    return false;
  }


  /**
   * combine a route with dynamic parameter to its data.
   * 
   * @param   string $route   the route to tweak.
   * @param   mixed $data     the param(s).
   * @return  string|false    returns a complete route on success, and false when no placeholder is found in route.
   */
  public static function combine(string $route, $data)
  {
    @preg_match('/^.+(?<placeholder>\{(?<keyword>.+)\})(.+)?$/i', $route, $placeholder);
    if ($placeholder) {
      return @preg_replace("/{$placeholder['placeholder']}/i", $data, $route);
    }
    return false;
  }
}
