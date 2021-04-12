<?php

namespace Flex\Utilities;

use Flex\Utilities\Sessioneer;

class Middleware
{

    /**
    *
    */
    public static function allow($user_role)
    {
        if (!Sessioneer::user_role() === $user_role) {
            Redirector::home();
        }
        return;
    }

    /**
    * 
    */
    public static function auth($route = null, $redirect_to = null, $required = true)
    {
        if (is_null($route)) {
            if (!Sessioneer::logged_in()) {
                Redirector::home();
            }
            return;
        }

        if (is_array($route)) {
            if (Request::is_get($route) && !Sessioneer::logged_in() === $required) {
                is_null($redirect_to) ? Redirector::home() : Redirector::route($redirect_to);
            }
            return;
        }

        if (Request::is_get($route) && !Sessioneer::logged_in() === $required) {
            is_null($redirect_to) ? Redirector::home() : Redirector::route($redirect_to);
        }
        return;
    }


    /**
    * 
    */
    public static function access($route, $id, $value)
    {
        if (is_array($value)) {
            if (Request::is_get($route) &&  array_search(Sessioneer::get($id), $value) === false) {
                Redirector::home();
            }

        } else {
            if (Request::is_get($route) &&  Sessioneer::get($id) !== $value) {
                Redirector::home();
            }
        }
        return;
    }
}
