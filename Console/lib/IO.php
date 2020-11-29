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
    return static::write("{$data->scope}/{$name}.php", $data->content, true);
  }


  /** write content to file. */
  private static function write($path, $content, $isBase64 = false)
  {
    $handle = @fopen($path, "w");
    @fwrite($handle, $isBase64 ? base64_decode($content) : $content);
    @fclose($handle);
    return;
  }
}
