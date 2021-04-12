<?php

namespace Flex\Handlers;

use Flex\Utilities\Response;
use Flex\Utilities\Auth;

class HomeHandler
{

  /**
   * index resource. 
   * 
   * @return void
   */
  public static function index()
  {
    // return @Renderer::view('index');
    return Response::json(200, [
      'message' => "Welcome to FlexCore."
    ]);
  }


  /**
   * info resource.
   */
  public static function info()
  {
    if (!Auth::check())
    {
      return @Response::json(401, [
        'status' => "NOT_AUTHORIZED",
        'message' => "You are not permitted to access nor submit data to this resource."
      ]);
    }

    return @Response::json(200, [
      'status' => "WELCOME",
      'message' => "Welcome to FlexCore.",
    ]);
  }

}
