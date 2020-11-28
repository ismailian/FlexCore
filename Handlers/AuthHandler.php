<?php

namespace Flex\Handlers;

use Flex\Utilities\Request;
use Flex\Utilities\Viewer;
use Flex\Processors\Login;
use Flex\Processors\Register;


class AuthHandler
{

  /**
   * Attempt an authentication. 
   * 
   * @return view returns a view with data if any.
   */
  public static function login()
  {
    $username = Request::body()->username;
    $password = Request::body()->password;

    // $result = Login::submit($username, $password);
    return @Viewer::view('auth.login');
  }


  /**
   * Attempt a user registration.
   * 
   * @return bool returns true on success, false on failure.
   */
  public static function register()
  {
    $username = Request::body()->username;
    $email    = Request::body()->email;
    $fullname = Request::body()->fullname;
    $password = Request::body()->password;

    // $result = Register::submit($username, $email, $fullname, $password);
    return @Viewer::view('auth.register');
  }
}
