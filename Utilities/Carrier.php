<?php

/**
 * Carrier is a Transfer Mechanism to deliver data between handlers and views.
 */

class Carrier
{
    static $data = [];

    /**
     * Insert an associative array or object to be accessable to the views.
     * 
     * @param mixed $var any type of variables but should be name.
     */
    public static function input($var)
    {
        static::$data = array_merge(static::$data, (array) $var);
    }

    /**
     * Get the entire input data.
     * 
     * @return Object all data as an object.
     */
    public static function output()
    {
        return (object) static::$data;
    }

    public static function __callStatic($name, $args)
    {
        return array_key_exists($name, static::$data) ? static::output()->{$name} : null;
    }
}
