<?php

# --------------   Entry Point  ----------- #
require_once __DIR__ . '/Config/App.php';   #
# ----------------------------------------- #


use App\App;
use App\Utilities\Router;

# setup router
$router = new Router();

# regular routes
$router->get('/',         'index');
$router->get('/docs',     'docs');
$router->get('/release',  'features');

# advanced routes
$router->get('/u/@{user}',         'users/index');
$router->get('/u/@{user}/profile', 'users/profile');
