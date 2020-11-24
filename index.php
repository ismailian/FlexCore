<?php

# --------------   Entry Point  ----------- #
require_once __DIR__ . '/Config/App.php';   #
# ----------------------------------------- #


use App\App;
use App\Utilities\Router;

// set up router
$router = new Router();

// Regular Routes
$router->get('/', 'index');

// Auth routes
// $router->get('/u/sign_in', 'auth/login');
$router->get('/u/sign_up', 'auth/register');

// Dynamic Routes with Params
$router->get('/u/@{user}',         'users/index');
$router->get('/u/@{user}/profile', 'users/profile');
