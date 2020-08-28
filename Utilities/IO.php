<?php

class IO
{

    /**
     * @description This class creates, updates and deletes files.
     */

    /**
     * @description Create new files.
     * @param string $filename The full path of the file to be created.
     * @return boolean returns true if the process was successfull, false if otherwise.
     */
    public static function create($filename)
    {
        try {

            # create file #
            $handle = @fopen($filename, 'x+');
            @fwrite($handle, '');
            @fclose($handle);
            return true;
            # create file #

        } catch (\Throwable $th) {

            # return false #
            return false;
            # return false #

        }
    }

    /**
     * @description Delete files.
     * @param string $filename The full path of the file to be deleted.
     * @return boolean returns true if the process was successfull, false if otherwise.
     */
    public static function delete($filename)
    {
        # delete file #
        return unlink($filename);
        # delete file #
    }
}
