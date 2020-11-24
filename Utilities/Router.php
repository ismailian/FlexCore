<?php

namespace App\Utilities;

use App\Utilities\Request;
use App\Utilities\UrlParser;
use App\Utilities\Viewer;

class Router
{

    private $routes;
    public $dumpRoutes = false;

    function __construct()
    {
        $this->routes = [];
    }


    // Handles Get Method:
    public function get($route, $view, $middleware = null)
    {
        if (UrlParser::isParameterized($route)) {
            if (UrlParser::match($route)) {
                $data = UrlParser::match($route);
                if (!in_array($route, $this->routes)) array_push($this->routes, $data->url);
                if (Request::is_get($route)) return @Viewer::view($view, $data);
            }
        } else {
            if (UrlParser::absolutePath() !== $route) return;
            if (!in_array($route, $this->routes)) array_push($this->routes, $route);
            if (Request::is_get($route)) return @Viewer::view($view);
        }
    }

    // Handles Post Method:
    public function post($route, $view, $middleware = null)
    {
        if (UrlParser::absolutePath() !== $route) return;
        if (!in_array($route, $this->routes)) array_push($this->routes, $route);
        if (Request::is_post($route)) @Viewer::view($view);
        @Viewer::view('errors/404', 404);
    }

    // Directly Render View:
    public function render($route, $view, $middleware = null)
    {
        if (UrlParser::absolutePath() !== $route) return;
        if (!in_array($route, $this->routes)) array_push($this->routes, $route);
        if ($this->dumpRoutes) return;

        // render
        @Viewer::view($view);
    }

    // private methods

    # dump all registered routes
    private function dump()
    {
        // Response::json('debug', ['routes' => $this->routes]);
        Response::ctype('application/json');
        print_r($this->routes);
        exit();
    }

    function __destruct()
    {
        $currentPath = UrlParser::absolutePath();
        if (!in_array($currentPath, $this->routes)) {
            @Viewer::view('errors/404', 404);
            exit();
        }
    }
}

/**
 * Router
 * ------
 *
 *
 * description:
 *      Router should handle the absolute url using request method as a static method in router
 *      and then forward that to Viewer accordingly. With proper checks of course.
 *
 *
 *  ex:
 *      -> Router::get('home',        'the_view_to_forward_to');
 *      -> Router::post('user/login', 'the_view_to_forward_to');
 *      -> Router::default('{name}',  'the_view_to_forward_to');
 */
