<?php

##############################################
###############   Entry Point  ###############
##############################################
// require_once __DIR__ . '/config/Init.php';   #
##############################################

## ROUTES ##
// Router::get('home', 'index');
## ROUTES ##


// Router::default();

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

Response::ctype('json');
print_r($uri);
