<?php

namespace Flex\Utilities;

class Viewer
{

  /**
   * Render a view to the client browser.
   * 
   * @param   String $view_name the view name to render.
   * @param   Mixed $data data to send to the view.
   * @param   Int $status_code status code to accompany the response.
   */
  public static function view($view_name, $data = null, $status_code = 200)
  {
    if (static::match($view_name)) {
      http_response_code($status_code);
      !is_null($data) ? extract($data, EXTR_OVERWRITE) : null;
      @include(static::match($view_name));
      exit();
    }

    http_response_code(404);
    @include(Views . 'errors/404.php');
    exit();
  }

  /**
   * Match a view name to a template.
   * 
   * @param   String $view_name the view name to match.
   * @return  String|False return template name on success, false on failure.
   */
  private static function match($view_name)
  {
    if (static::exists($view_name)) {
      return (Views . str_replace('.', "/", $view_name) . ".php");
    }
    return false;
  }

  /**
   * Check is a view exists
   * 
   * @param   String $view_name the view name.
   * @return  Bool returns true on success and false on failure.
   */
  private static function exists($view_name)
  {
    return file_exists(Views . str_replace('.', "/", $view_name) . ".php");
  }
}
