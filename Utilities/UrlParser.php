<?php

namespace App\Utilities;

use App\Functions\Server;
use App\Functions\Cleaner;

class UrlParser
{

    # get absolute path:
    public static function absolutePath()
    {
        return @urldecode(parse_url(Server::header('REQUEST_URI'), PHP_URL_PATH));
    }

    # return all segments of request uri in array:
    public static function segments()
    {
        $uriInfo = @urldecode(parse_url(Server::header('REQUEST_URI'), PHP_URL_PATH));
        return array_merge(array('/'), Cleaner::clean_array(explode('/', $uriInfo)));
    }

    # check wether url is dynamic:
    public static function isParameterized($route)
    {
        return @preg_match('/^.+(?<placeholder>\{(?<keyword>.+)\})(.+)?$/i', $route, $result);
    }

    # url with paramets parsed
    public function match($pattern)
    {
        // match placeholder & keyword
        @preg_match('/^.+(?<placeholder>\{(?<keyword>.+)\})(.+)?$/i', $pattern, $placeholder);
        @preg_match('|^(?<name>.+):(?<chars>.+)$|iU', $placeholder['keyword'], $chars);

        $keyword = $placeholder['keyword'];
        $badChars = "[^/\\ ]";

        if (!empty($chars))
        {
            $keyword  = $chars['name'];
            $badChars = str_replace(',', '', $chars['chars']);
            $badChars = "[^/\\ {$badChars}]";
        }

        $output = preg_replace("/({$placeholder['placeholder']})/i", "(?<{$keyword}>{$badChars}+)", $placeholder[0]);

        $nextPtr = json_encode($output, JSON_UNESCAPED_SLASHES);
        $nextPtr = str_replace('"', '', $nextPtr);
        $nextPtr = str_replace('/', '\/', $nextPtr);
        $nextPtr = "/^{$nextPtr}(\/?)$/i";

        @preg_match($nextPtr, str_replace('//', '/', UrlParser::absolutePath()), $argument);

        $match = !empty($argument) ? $argument[0] : null;
        $param = !empty($argument) ? $argument[$placeholder['keyword']] : null;

        if (!empty($argument))
        {
            return (object)[
                "url"      => $match,
                "$keyword" => $param,
            ];
        }
        return false;
    }
}



/**
 * 
 * UrlParser.php
 * =============
 *  * 
 * description:
 *      This class handles url parsing and data extraction (method, path, query, body..etc.)
 *      
 * usage:
 *      -> UrlParser::absolutePath();
 *      -> UrlParser::segments();
 *      -> UrlParser::has();
 * 
 */
