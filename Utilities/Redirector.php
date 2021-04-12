<?php

namespace Flex\Utilities;

class Redirector
{

    /**
     * Redirect to Home Path:
     * 
     */
    public static function home()
    {
        Request::clear();
        header("Location: /");
        return;
    }

    
    /**
     * @desc Redirect to A particular Path
     * 
     * @var string $path The URI to redirect to.
     */
    public static function route(String $path)
    {
        Request::clear();
        header(str_replace("_r_", $path, "Location: /_r_"));
        return;
    }
}
