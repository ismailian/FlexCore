<?php

namespace Flex\Processors;

use Flex\Utilities\Download;

/**
 * [Export] pushes downloads.
 */
class Export
{
    /**
     * allow user to download a certain file.
     * 
     * @param string $filepath the full path of the file.
     * @param string $filename the file name to serve to the client browser.
     */
    public static function download($filepath, $filename)
    {
        return @Download::push(STORAGE . $filepath, $filename);
    }
}
