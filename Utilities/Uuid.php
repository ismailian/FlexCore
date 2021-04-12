<?php

namespace Flex\Utilities;

class Uuid
{

    // uuid version 1.0 // 6-char id: #xxxxxx
    public static function v1()
    {
        return strtoupper(bin2hex(random_bytes(3)));
    }


    // uuid version 2.0 // 8-char id: #xxxxxxxxx
    public static function v2()
    {
        return strtoupper(bin2hex(random_bytes(4)));
    }


    // uuid version 1.0 // 4-char 3-part id: #xxxxxx
    public static function v3()
    {
        $p01 = strtoupper(bin2hex(random_bytes(2)));
        $p02 = strtoupper(bin2hex(random_bytes(2)));
        $p03 = strtoupper(bin2hex(random_bytes(2)));
        return ($p01 . "-" . $p02 . "-" . $p03);
    }


    // uuid version 1.0 // 4-char 4-part id: #xxxxxx
    public static function v4()
    {
        $p01 = strtoupper(bin2hex(random_bytes(2)));
        $p02 = strtoupper(bin2hex(random_bytes(2)));
        $p03 = strtoupper(bin2hex(random_bytes(2)));
        $p04 = strtoupper(bin2hex(random_bytes(2)));
        return ($p01 . "-" . $p02 . "-" . $p03 . "-" . $p04);
    }
}
