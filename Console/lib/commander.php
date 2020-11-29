<?php

namespace Flex\Console\Library;

class Commander
{

  /**
   * Property commands holds a list of runnable commands.
   */
  private static $commands = [
    'Handler',
    'Model',
    'Module',
    'Utility',
  ];

  /** Property actions holds a list of doable actions. */
  private static $actions = ["Create", "Delete"];

  /**
   * parse console sent arguments.
   * 
   * @return object|array|bool returns an object on success, array on missing arguments, false on failure.
   */
  public static function parse()
  {
    if (count($_SERVER['argv']) <= 1) return false;
    $args = array_slice($_SERVER['argv'], 1);

    if (count($args) === 3) {

      $terminal = (object)[
        "command" => $args[0],
        "action"  => $args[1],
        "name"    => $args[2],
      ];

      # does command exist in commands list?
      if (in_array(ucfirst($terminal->command), (static::$commands))) {
        # does action exist in actions list?
        if (in_array(ucfirst($terminal->action), (static::$actions))) {
          # return $terminal intact.
          return $terminal;
        }

        # return error message.
        return [
          "status" => false,
          "reason" => "`{$terminal->action}` of command [{$terminal->command}] is not recognized."
        ];
      }

      # return error message.
      return [
        "status" => false,
        "reason" => "[{$terminal->command}] command is not recognized."
      ];
    }
    return false;
  }


  /**
   * print output to the console.
   * 
   * @param mixed $data the data to print.
   */
  public static function help()
  {
    echo PHP_EOL;
    echo "Cli Usage:";
    echo PHP_EOL;
    echo PHP_EOL;

    foreach (static::$commands as $command) {
      $seperator = "           ";
      $seperator = substr($seperator, 0, strlen($seperator) - strlen($command));
      $output = "   ";
      $output .= "- /{$command}" . $seperator;
      $output .= "Create, delete or list {$command}s.";
      $output .= PHP_EOL;
      echo $output;
    }
    exit;
  }
}
