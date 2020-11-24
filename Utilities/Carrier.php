<?php

// namespace App\Utilities;

/**
 * 
 * Carrier is a Transfer Mechanism to deliver data throughout handlers and views.
 */
class Carrier
{
    static $data = [];

    /**
     * Insert an associative array or object to be accessable to the views.
     * @var mixed any type of variables but should be name.
     */
    public function input($var)
    {
        static::$data = array_merge(static::$data, (Array) $var);
    }

    /**
     * Get the entire input data.
     * @return Object all data as an object.
     */
    public function output()
    {
        return (Object) static::$data;
    }

    public static function __callStatic($name, $args) {
        return array_key_exists($name, static::$data) ? static::output()->{$name} : null;
    }
}