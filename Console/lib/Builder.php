<?php

namespace Flex\Console\Library;

class Builder
{

  /** build boilerplate for all scopes. */
  private static function build($scope, $name)
  {
    $boilerplate = "";
    $boilerplate .= "<?php";
    $boilerplate .= PHP_EOL . PHP_EOL;
    $boilerplate .= "namespace Flex\\" . @ucfirst($scope) . ";";
    $boilerplate .= PHP_EOL . PHP_EOL;
    $boilerplate .= "class {$name}" . PHP_EOL;
    $boilerplate .= "{" . PHP_EOL . PHP_EOL;
    $boilerplate .= "\t/** index method */" . PHP_EOL;
    $boilerplate .= "\tpublic static function index()" . PHP_EOL;
    $boilerplate .= "\t{" . PHP_EOL;
    $boilerplate .= "\t\t// code goes here..." . PHP_EOL;
    $boilerplate .= "\t}" . PHP_EOL;
    $boilerplate .= "}" . PHP_EOL;
    return $boilerplate;
  }

  /**
   * get handler boilerplate.
   * 
   * @return string returns a base64 estring contaning boilerplate content.
   */
  public static function handler($name)
  {
    return (object)[
      "scope"   => "Handlers",
      "content" => base64_encode(static::build("Handlers", $name)),
    ];
  }

  /**
   * get function boilerplate.
   * 
   * @return string returns a base64 estring contaning boilerplate content.
   */
  public static function function($name)
  {
    return (object)[
      "scope"   => "Functions",
      "content" => base64_encode(static::build("Functions", $name)),
    ];
  }

  /**
   * get utility boilerplate.
   * 
   * @return string returns a base64 estring contaning boilerplate content.
   */
  public static function utility($name)
  {
    return (object)[
      "scope"   => "Utilities",
      "content" => base64_encode(static::build("Utilities", $name)),
    ];
  }

  /**
   * get model boilerplate.
   * 
   * @return string returns a base64 estring contaning boilerplate content.
   */
  public static function model($name)
  {
    return (object)[
      "scope"   => "Models",
      "content" => base64_encode(static::build("Models", $name)),
    ];
  }

  /**
   * get Module boilerplate.
   * 
   * @return string returns a base64 estring contaning boilerplate content.
   */
  public static function module($name)
  {
    return (object)[
      "scope"   => "Modules",
      "content" => base64_encode(static::build("Modules", $name)),
    ];
  }
}
