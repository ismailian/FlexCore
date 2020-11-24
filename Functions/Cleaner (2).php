<?php

namespace App\Functions;

class Cleaner
{
    // Clearn Empty Entries in Arrays:
    public static function clean_array($input_array)
    {
        return array_filter($input_array, function ($element) { return !empty($element); });
    }

    // array to string:
    public static function array2string($array, $delimeter = ",")
    {
        $output = "";
        foreach ($array as $item) {
            $output .= $item . $delimeter;
        }
        return substr($output, 0, strlen($output) - 1);
    }
}
