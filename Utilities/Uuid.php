<?php

namespace App\Utilities;

class Uuid
{

    // uuid version 1.0 // 6-char id: #xxxxxx
    public static function v1()
    {
        ## return ##
        return strtoupper(bin2hex(random_bytes(3)));
        ## return ##
    }


    // uuid version 2.0 // 8-char id: #xxxxxxxxx
    public static function v2()
    {
        ## return ##
        return strtoupper(bin2hex(random_bytes(4)));
        ## return ##
    }


    // uuid version 1.0 // 4-char 3-part id: #xxxxxx
    public static function v3()
    {
        ## parts ##
        $p01 = strtoupper(bin2hex(random_bytes(2)));
        $p02 = strtoupper(bin2hex(random_bytes(2)));
        $p03 = strtoupper(bin2hex(random_bytes(2)));
        ## parts ##

        ## return ##
        return ($p01 . "-" . $p02 . "-" . $p03);
        ## return ##
    }


    // uuid version 1.0 // 4-char 4-part id: #xxxxxx
    public static function v4()
    {
        ## parts ##
        $p01 = strtoupper(bin2hex(random_bytes(2)));
        $p02 = strtoupper(bin2hex(random_bytes(2)));
        $p03 = strtoupper(bin2hex(random_bytes(2)));
        $p04 = strtoupper(bin2hex(random_bytes(2)));
        ## parts ##

        ## return ##
        return ($p01 . "-" . $p02 . "-" . $p03 . "-" . $p04);
        ## return ##
    }
}



/**
 * Uuid.php
 * ==========
 * 
 * 
 * Description:
 *      Uuid handles creation of extreemly random and unique ids for identifying items.
 *      And it currently supports 4 versions. 
 * 
 * 
 *  Usage:
 *      -> Uuid::v1(); => #xxxxxx
 *      -> Uuid::v2(); => #xxxxxxxx
 *      -> Uuid::v3(); => #xxx-xxx-xxx
 *      -> Uuid::v4(); => #xxxx-xxxx-xxxx
 */
