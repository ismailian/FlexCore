<?php

namespace Flex\Handlers;

use Flex\Utilities\Renderer;


class UserHandler
{

  /**
   * dashboard page. 
   * 
   * @return view returns a views with data if any.
   */
  public static function index($user)
  {
    return @Renderer::view("users.index", [
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
    return @Renderer::view("users.profile", [
      "username" => $user->user,
      "email"    => $user->user . "@mailbox.com",
      "fullname" => "administrator",
    ]);
  }
}
