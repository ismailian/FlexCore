<?php

namespace App\Utilities;

class Viewer
{

    ## Renders The View:
    public static function view($view_name, $data = null, $status_code = 200)
    {
        if (static::match($view_name)) 
        {
            http_response_code($status_code);
            if (!is_null($data)) {
                \Carrier::input($data);
            }
            @include( static::match($view_name) );
            exit();
        }

        http_response_code(404);
        @include (Views . 'errors/404.php');
        exit();
    }

    private static function match($view_name)
    {
        if (static::exists($view_name)) 
        {
            return (Views . $view_name . ".php");
        }
        return false;
    }

    private static function exists($view_name)
    {
        return (file_exists(Views . $view_name . ".php"));
    }
}


/**
 * Viewer.php
 * ==========
 * 
 * 
 * description:
 *      Viewer handles the rendering of the views as well as performing other checks.
 * 
 *  ex:
 *      -> Viewer::view('view_name');
 *      -> Viewer::exists('view_name');
 *      -> Viewer::match('view_name'); [private] (matches a view name to its equivalent filename.)
 */
