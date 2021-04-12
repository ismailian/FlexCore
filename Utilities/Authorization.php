<?php

namespace Flex\Utilities;

use Flex\Functions\Server;

class Auth
{

    /**
    * Authorize Client.
    */
    public static function make()
    {
        return (object) [];
    }

    /**
    * Check if client is authorized.
    */
    public static function check()
    {
        $authKey = @Request::headers('Authorization');
        if (!$authKey)  return false;

        preg_match('/^Token (?<key>[a-fA-F0-9]{32})$/i', $authKey, $keys);
        if (!$keys || !$keys['key']) return false;
        
        // check key against database.
        return false;
    }

}