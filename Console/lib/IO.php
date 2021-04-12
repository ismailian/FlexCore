<?php

namespace Flex\Console\Library;

use Flex\Console\Library\Builder;

class IO
{

  /**
   * Create a file.
   * 
   * @param string $scope the target scope.
   * @param string $name the filename.
   * @return bool returns true on success, false on failure.
   */
  public static function create(string $scope, string $name)
  {
    $data = Builder::$scope($name);
    if (!static::exists($data->scope, @ucfirst($name))) {
      return static::write("{$data->scope}/" . @ucfirst($name) . ".php", $data->content, true);
    }
    return false;
  }


  /** 
  * Write content to file.
  * 
  * @param string $path the target path.
  * @param string $content the content to write to file.
  * @param bool $isBase64 whether or not to treat content as base64 data.
  */
  private static function write($path, $content, $isBase64 = false)
  {
    $handle = @fopen($path, "w");
    @fwrite($handle, $isBase64 ? base64_decode($content) : $content);
    @fclose($handle);
    return true;
  }


  /**
  * Check whether the target file exists or not.
  *
  * @param string $filepath the target file.
  * @param bool returns the check result. 
  */
  private static function exists($scope, $name) {
    return file_exists($scope . '/' . $name . '.php');
  }
}
