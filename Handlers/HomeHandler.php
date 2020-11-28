<?php

namespace Flex\Handlers;

use Flex\Utilities\Viewer;


class HomeHandler
{

  /**
   * index page. 
   * 
   * @return view returns a views with data if any.
   */
  public static function index()
  {
    return @Viewer::view('index');
  }


  /**
   * docs page
   * 
   * @return view returns a views with data if any.
   */
  public static function docs()
  {
    return @Viewer::view('docs');
  }


  /**
   * release page
   * 
   * @return view returns a views with data if any.
   */
  public static function release()
  {
    return @Viewer::view('release');
  }
}
