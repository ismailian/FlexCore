<?php

namespace Flex\Processors;

/**
 * Login Processor.
 */
class Login
{

  /**
   * An attempt to authenticate a user based on provided credentials.
   * if the login is successful then a login session is setup automatically.
   * 
   * @param string $login the login username, email or id.
   * @param string $password the login password.
   * @return bool returns true on success and false on failure.
   */
  public static function submit(string $login, string $password)
  {
    // code
  }
}
