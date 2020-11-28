<?php

# error logging..
error_reporting(E_ALL);

# Session
session_start();

# constants
require_once __DIR__ . "/Constants.php";

# vendor autoloader:
// file_exists(Vendor . 'autoload.php') ? require_once Vendor . 'autoload.php' : null;

# imports
require_once Modules      . "main.php";
require_once Utilities    . "main.php";
require_once Functions    . "main.php";
require_once Models       . "main.php";
require_once Handlers     . "main.php";
require_once Processors   . "main.php";

# instances
require_once __DIR__ . "/Instances.php";
