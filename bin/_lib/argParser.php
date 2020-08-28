<?php

$args = $argv;

class argParser
{

    /**
     * @description This class parses and returns a object containing all data passed to cli.
     */

    /**
     * @description Parse data passed through command line.
     * @return object returns and object of all passed data.
     */
    public static function parse()
    {
        global $args;
        $args = (object)[
            'command'     => explode(':', $args[1])[0],
            'sub_command' => explode(':', $args[1])[1],
            'params'      => $args[2],
        ];
        return $args;
    }
}
