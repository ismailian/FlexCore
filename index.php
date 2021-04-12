<?php

# --------------   Entry Point  ----------- #
require_once __DIR__ . '/Config/App.php';   #
# ----------------------------------------- #

use Flex\Utilities\Router;
use Flex\Handlers\HomeHandler;

/**
 * Router Instance.
 */
$router = new Router();


/**
 * Public Routes/Resources.
 */
$router->get('/',                  [HomeHandler::class, "index"]);
$router->get('/profile', 		   [HomeHandler::class, "profile"]);
$router->get('/u/@{user}/profile', [HomeHandler::class, "preview"]);


/**
* Static Pages
*/
$router->render('/about',   'about');
$router->render('/contact', 'contact');