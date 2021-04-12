<?php

namespace Flex\Handlers;


use Flex\Utilities\Download;
use Flex\Utilities\IO;

class DownloadHandler
{

    /**
     * index method
     *
     * @return void Forces the client browser to download the given file.
     */
    public static function index()
    {
        Download::push(
            IO::get('public/archives', 'winrar.zip'), 
            'winrar-6.0.0-x64.zip', 
            true
        );
    }
}
