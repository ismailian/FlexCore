<?php

namespace Flex\Utilities;

class Hash
{


    /**
    * Generate hash for plain text passwords.
    *
    * @param string $input the password to hash.
    * @return string the hashed version of the password.
    */
    public static function make($input)
    {
        return password_hash($input, PASSWORD_ARGON2ID);
    }


    /**
    * Verify a hash
    *
    * @param string $password the plain text password.
    * @param string $hash the hash to check password against.
    */
    public static function verify($password, $hash)
    {
        return password_verify($password, $hash);
    }

}
