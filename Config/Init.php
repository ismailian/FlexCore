<?php

## error logging..
// error_reporting(false);

## Session
session_start();

## constants ##
require_once __DIR__ . "/Constants.php";

## vendor autoloader:
require_once Vendor . 'autoload.php';

## imports ##
require_once Modules   . "main.php";
require_once Utilities . "main.php";
require_once Functions . "main.php";
require_once Models    . "main.php";
require_once Handlers  . "main.php";

# instances #
require_once __DIR__ . "/Instances.php";
