<?php

namespace Flex\Utilities;

class Download
{

  /**
   * push downloads to client browser
   *
   * @param string $filepath the absolute path to the file.
   * @param string $contentType the content type of the file.
   * @param string $customFilename assign a custom filename to the Content-Disposition header.
   * @param bool $showFilesize whether the client receives the content-length header or not.
   */
  public static function push($filepath, $customFilename = null, $showFilesize = false, $contentType = "application/octect-stream")
  {
    if ($showFilesize) header('Content-Length: ' . filesize($filepath));
    $filename = $customFilename ?? pathinfo($filepath)['basename'];

    header('Content-Type: ' . $contentType);
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    header('Cache-Control: no-cache, max-age=0');
    header('Cache-Control: no-cache, max-age=0, stale-while-revalidate=300');

    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');                ## Date in the past.
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');   ## always modified
    header('Pragma: no-cache');                                      ## HTTP/1.0

    $srcStream = fopen($filepath, 'rb');
    $dstStream = fopen('php://output', 'wb');

    stream_copy_to_stream($srcStream, $dstStream);
    ob_flush();
    flush();
  }
}
