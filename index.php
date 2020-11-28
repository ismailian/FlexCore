<?php

# --------------   Entry Point  ----------- #
require_once __DIR__ . '/Config/App.php';   #
# ----------------------------------------- #

use Flex\Utilities\Router;
use Flex\Handlers\AuthHandler;
use Flex\Handlers\HomeHandler;
use Flex\Handlers\UserHandler;
use Flex\Handlers\DownloadHandler;

// # setup router
$router = new Router();

# regular routes
$router->get('/',         [HomeHandler::class, "index"]);
$router->get('/docs',     [HomeHandler::class, "docs"]);
$router->get('/release',  [HomeHandler::class, "release"]);

# auth routes:
$router->get('/login',    [AuthHandler::class, "login"]);
$router->get('/register', [AuthHandler::class, "register"]);

# advanced routes
$router->get('/@{user}',         [UserHandler::class, "index"]);
$router->get('/@{user}/profile', [UserHandler::class, "show"]);
