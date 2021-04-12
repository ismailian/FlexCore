<?php

namespace Flex\Functions;

class Cleaner
{

    /**
     * Remove empty items from an array.
     * @param Array $array the target array to clean.
     * @return Array returns an array without empty placeholders.
     */
    public static function clean_array($input_array)
    {
        return array_filter($input_array, function ($elm) {
            return !empty($elm);
        });
    }

    /**  */
    public static function array2string($array, $delimeter = ",")
    {
        $output = "";
        foreach ($array as $item) {
            $output .= $item . $delimeter;
        }
        return substr($output, 0, strlen($output) - 1);
    }

    /**
     * Remove item from an array using key name.
     * @param Array $array the target array to remove from.
     * @param String $key the item name to remove.
     * @return Array returns an array without the given key.
     */
    public static function array_remove($array, $key)
    {
        return array_flip(array_filter(array_flip($array), function ($elm) use ($key) {
            return ($elm !== $key);
        }));
    }
}
