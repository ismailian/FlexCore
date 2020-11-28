<?php

namespace Flex\Utilities;

class Download
{

  /**
   * push downloads to client browser
   */
  public static function push($fullpath, $filename = null, $contentType = "application/octect-stream")
  {
    header('Content-Type: ' . $contentType);
    header('Content-Disposition: attachment;filename="' . $filename . '"');

    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    header('Cache-Control: no-cache, max-age=0');
    header('Cache-Control: no-cache, max-age=0, stale-while-revalidate=300');

    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');                ## Date in the past.
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');   ## always modified
    header('Pragma: no-cache');                                      ## HTTP/1.0

    $srcStream = fopen($fullpath, 'rb');
    $dstStream = fopen('php://output', 'wb');

    stream_copy_to_stream($srcStream, $dstStream);
    ob_flush();
    flush();
  }
}
