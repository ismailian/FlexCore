#!/bin/php

<?php

error_reporting(E_ALL);

/** require necessary files. */
require_once __DIR__ . '/Console/__Init.php';

/** new syntax */
$cli = new Flex\Console\Cli();


/**
| **
| ****
| ***** Initialize cli.
| ****
| **
*/
$cli->init();
