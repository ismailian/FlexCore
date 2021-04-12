<?php

/**
 * The environment properties.
 *
 * @var string DEBUG_MODE the environment debug mode.
*/
define("DEBUG_MODE", true);

/**
 * database properties
 *
 * @var string HOSTNAME the database hostname.
 * @var string USERNAME the database username.
 * @var string PASSWORD the database password.
 * @var string DATABASE the database name.
 */
define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "");


/**
 * Application properties.
 *
 * @var string ROOT the server document root.
 * @var string STORAGE the application storage path.
 * @var string CONFIG the application config path.
 * @var string Modules the application modules path.
 * @var string Utilities the application utilities path.
 * @var string Functions the application functions path.
 * @var string Handlers the application handlers path.
 * @var string Processors the application processors path.
 * @var string Models the application models path.
 * @var string Views the application Views path.
 * @var string Vendor the application Vendor path.
 */
define("ROOT",        $_SERVER['DOCUMENT_ROOT'] . "/");
define("STORAGE",     ROOT . "Storage/");
define("CONFIG",      ROOT . "Config/");
define("Modules",     ROOT . "Modules/");
define("Utilities",   ROOT . "Utilities/");
define("Functions",   ROOT . "Functions/");
define("Handlers",    ROOT . "Handlers/");
define("Processors",  ROOT . "Processors/");
define("Models",      ROOT . "Models/");
define("Views",       ROOT . "Views/");
define("Vendor",      ROOT . "vendor/");
