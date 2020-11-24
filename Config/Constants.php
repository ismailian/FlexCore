<?php

## App constants ##
define("DEBUG_MODE", true);

## database ##
define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "");


## directories ##
define("ROOT",      $_SERVER['DOCUMENT_ROOT'] . "/");
define("CONFIG",    ROOT . "Config/");
define("Modules",   ROOT . "Modules/");
define("Utilities", ROOT . "Utilities/");
define("Functions", ROOT . "Functions/");
define("Handlers",  ROOT . "Handlers/");
define("Models",    ROOT . "Models/");
define("Views",     ROOT . "Views/");
define("Vendor",    ROOT . "vendor/");
