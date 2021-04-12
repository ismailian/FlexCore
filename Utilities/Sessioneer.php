<?php

namespace Flex\Utilities;

class Sessioneer
{


    // setup the sessioneer
    public static function setup($session = null, $identifier = null)
    {
        $keys = [];

        if (!is_null($session) && is_array($session)) {
            foreach ($session as $sKey => $sValue) {
                if (!is_null($identifier) && $identifier === $sKey) {
                    $_SESSION['identifier'] = $identifier;
                }

                $_SESSION[$sKey] = $sValue;
                array_push($keys, $sKey);
            }

            $_SESSION['keys'] = $keys;
        }
    }

    /** guest session **/
    public static function guest()
    {
        if (!Sessioneer::logged_in()) {
            Sessioneer::setup(['user_role' => 'guest'], 'user_role');
        }
    }

    /**
    * Update a session property
    */
    public static function update($input, $value)
    {
        $_SESSION[$input] = ($value);
    }

    /**
    * Get a value from session by key name. 
    */
    public static function get($input_name)
    {
        if (Sessioneer::has($input_name)) {
            return $_SESSION[$input_name];
        }
        return false;
    }

    /** regenerate session id **/
    public static function refresh()
    {
        session_regenerate_id();
    }

    /*** destroy session */
    public static function destroy($input_name = null)
    {
        if (!is_null($input_name)) {
            unset($_SESSION[$input_name]);
            return;
        }

        session_unset();
        session_destroy();
        Sessioneer::setup(['user_role' => 'guest'], 'user_role');
    }


    // checks if session has an entry:
    public static function has($input_name)
    {
        return isset($_SESSION[$input_name]);
    }

    // dump all session input:
    public static function dump()
    {
        echo json_encode($_SESSION);
    }

    // get/set session input: 
    public static function __callStatic($name, $arguments)
    {
        if (Sessioneer::has($name)) {
            $content = $_SESSION[$name];

            if (!empty($arguments) && $arguments[0] === true) {
                Sessioneer::destroy($name);
            }
            return $content;
        }

        return false;
    }
}
