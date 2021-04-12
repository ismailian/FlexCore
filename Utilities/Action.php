<?php

namespace Flex\Utilities;

use Flex\Utilities\Sessioneer;

class Action
{

    /**
    *
    */
    public static function permit($role)
    {
        if (is_array($role)) {
            if (!Sessioneer::logged_in() or array_search(Sessioneer::user_role(), $role) === false) {
                Response::notAuthorized();
            }

        } else {
            if (!Sessioneer::logged_in() or Sessioneer::user_role() !== $role) {
                Response::notAuthorized();
            }
        }
    }
}
