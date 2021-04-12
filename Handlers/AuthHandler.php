<?php

namespace Flex\Handlers;

use Flex\Utilities\Request;
use Flex\Utilities\Renderer;
use Flex\Processors\Login;
use Flex\Processors\Register;


class AuthHandler
{

  /**
   * Attempt an authentication. 
   * 
   * @return void
   */
  public static function login()
  {
    $username = Request::body()->username;
    $password = Request::body()->password;

    // $result = Login::submit($username, $password);
    return @Renderer::view('auth.login');
  }


  /**
   * Attempt a user registration.
   * 
   * @return void
   */
  public static function register()
  {
    $username = Request::body()->username;
    $email    = Request::body()->email;
    $fullname = Request::body()->fullname;
    $password = Request::body()->password;

    // $result = Register::submit($username, $email, $fullname, $password);
    return @Renderer::view('auth.register');
  }
}
