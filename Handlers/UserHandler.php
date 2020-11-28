<?php

namespace Flex\Handlers;

use Flex\Utilities\Viewer;


class UserHandler
{

  /**
   * dashboard page. 
   * 
   * @return view returns a views with data if any.
   */
  public static function index($user)
  {
    return @Viewer::view("users.index", [
      "username" => $user->user,
    ]);
  }


  /**
   * show profile page. 
   * 
   * @return view returns a views with data if any.
   */
  public static function show($user)
  {
    return @Viewer::view("users.profile", [
      "username" => $user->user,
      "email"    => $user->user . "@mail.com",
      "fullname" => "administrator",
    ]);
  }
}
