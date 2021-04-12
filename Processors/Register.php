<?php

namespace Flex\Processors;

/**
 * Register Processor.
 */
class Register
{
  /**
   * An attempt to register a user based on provided data.
   * if the registration is successful then a login session is setup automatically.
   * 
   * @param string $username username.
   * @param string $email email.
   * @param string $fullname fullname.
   * @param string $password password.
   * @return bool returns true on success and false on failure.
   */
  public static function submit(string $username, string $email, string $fullname, string $password)
  {
    // code
  }
}
