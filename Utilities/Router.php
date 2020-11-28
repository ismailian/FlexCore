<?php

namespace Flex\Utilities;

use Flex\Functions\Cleaner;
use Flex\Functions\Server;
use Flex\Utilities\Request;
use Flex\Utilities\Response;
use Flex\Utilities\UrlParser;
use Flex\Utilities\Viewer;

class Router
{

  private $routes;
  private $data;
  public $dumpRoutes = false;

  function __construct()
  {
    $this->routes = [];
  }


  /** 
   * handle get requests to a given route.
   * 
   * @param string $route the route name to handle.
   * @param array $handler the view name to render.
   * @param string $middleware middleware to restrict access to view.
   */
  public function get($route, $handler)
  {
    if (!Request::isGet()) return;

    if ($this->data = UrlParser::match($route)) {
      if (!in_array($route, $this->routes)) array_push($this->routes, $this->data->url);
      return @call_user_func(
        "{$handler[0]}::{$handler[1]}",
        (object) Cleaner::array_remove((array) $this->data, "url")
      );
    }

    if (UrlParser::absolutePath() !== $route) return;
    if (!in_array($route, $this->routes)) array_push($this->routes, $route);
    return @call_user_func("{$handler[0]}::{$handler[1]}", null);
  }


  /** 
   * handle post requests to a given route.
   * 
   * @param string $route the route name to handle.
   * @param array $handler the view name to render.
   * @param string $middleware middleware to restrict access to view.
   */
  public function post($route, $handler)
  {
    if (!Request::isPost()) return;

    if ($this->data = UrlParser::match($route)) {
      if (!in_array($route, $this->routes)) array_push($this->routes, $this->data->url);
      return @call_user_func(
        "{$handler[0]}::{$handler[1]}",
        (object) Cleaner::array_remove((array) $this->data, "url")
      );
    }

    if (UrlParser::absolutePath() !== $route) return;
    if (!in_array($route, $this->routes)) array_push($this->routes, $route);
    return @call_user_func("{$handler[0]}::{$handler[1]}", null);
  }


  /** 
   * render a specific view regardless of the request method.
   * 
   * @param string $route the route name to handle.
   * @param string $view the view name to render.
   * @param string $middleware middleware to restrict access to view.
   */
  public function render($route, $view, $middleware = null)
  {
    if (UrlParser::absolutePath() !== $route) return;
    if (!in_array($route, $this->routes)) array_push($this->routes, $route);
    if ($this->dumpRoutes) return;
    return @Viewer::view($view);
  }


  /**
   * redirect to another endpoint.
   * 
   * @param string $route the route endpoint to redirect to.
   * @param string|array $data data that might be needed with the route such as params.
   */
  public static function redirect(string $route, $params)
  {
    Server::setHeader('location', UrlParser::combine($route, $params));
  }


  /**
   * dump all registered routes.
   */
  private function dump()
  {
    Response::ctype('application/json');
    print_r($this->routes);
    exit();
  }


  /**
   * dispose of some properties.
   */
  function __destruct()
  {
    $currentPath = UrlParser::absolutePath();
    if (!in_array($currentPath, $this->routes)) {
      @Viewer::view('errors/404', null, 404);
      exit();
    }
  }
}
