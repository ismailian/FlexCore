<?php

namespace Flex\Console;

require_once __DIR__ . "/lib/commander.php";
require_once __DIR__ . "/lib/Builder.php";
require_once __DIR__ . "/lib/IO.php";

use Flex\Console\Library\Commander;
use Flex\Console\Library\IO;

/**
 * This class handles all the operations done by the CLI.
 */
class Cli
{

  function __construct()
  {
  }

  public function init()
  {
    if ($terminal = Commander::parse()) {

      if (is_array($terminal)) {
        echo ($terminal['reason']);
        return;
      }

      $output = "[~] ";
      $output .= ($terminal->action === "create") ? "Creating a new " : "Deleting ";
      $output .= $terminal->command . " ";
      $output .= $terminal->name;

      echo PHP_EOL;
      echo $output;
      echo PHP_EOL;

      IO::create(strtolower($terminal->command), $terminal->name);
      echo ucfirst($terminal->command) . " created successfully.";
      return;
    }

    Commander::help();
  }
}
