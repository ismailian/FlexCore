<?php

namespace Flex\Utilities;

class IO
{
    /**
     * Create new files.
     *
     * @param string $filename The full path of the file to be created.
     * @return boolean returns true if the process was successful, false if otherwise.
     */
    public static function create($filename)
    {
        try {
            $handle = @fopen($filename, 'x+');
            @fwrite($handle, '');
            @fclose($handle);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Delete files.
     *
     * @param string $filename The full path of the file to be deleted.
     * @return bool returns true if the process was successful, false if otherwise.
     */
    public static function delete($filename)
    {
        return unlink($filename);
    }

    /**
     * Get absolute path of segment path(s) andOr file(s).
     *
     * @param array $paths
     * @return string|false returns a string with the absolute path if exists, otherwise a false.
     */
    public static function get(...$paths)
    {
        $absolutePath = IO::storage(implode(DIRECTORY_SEPARATOR, $paths));
        return file_exists($absolutePath) ? $absolutePath : false;
    }

    /**
     * Get the given path prepended with the storage directory.
     *
     * @param string $path the directory within the storage.
     * @return string returns the absolute path to the storage target directory.
     */
    private static function storage($path)
    {
        return (STORAGE . ($path[0] !== DIRECTORY_SEPARATOR ? DIRECTORY_SEPARATOR : null) . $path);
    }
}
