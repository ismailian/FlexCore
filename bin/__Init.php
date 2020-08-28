<?php

# libraries #
require_once "/www/FlexCore/Utilities/main.php";
require_once __DIR__ . "/_lib/argParser.php";


class Cli
{

    /**
     * This class handles all the operations done by the CLI.
     */

    # Commands #
    private $commands = [
        'handler' => ['create', 'delete'],
        'model'   => ['create', 'delete'],
        'module'  => ['create', 'delete'],
        'utility' => ['create', 'delete'],
        'view'    => ['create', 'delete']
    ];

    /**
     * @description Initialized the cli.
     * @return void
     */
    public static function init()
    {

        # parse #
        $data = argParser::parse();
        

        # command uncounted for #
        if (!empty($data->command) && !in_array($data->command, array_keys(Self::$commands))) throw new Exception("Command is not recognized", 0);

        # command # show top commands help.
        if (!empty($data->command)) {

            # sub command uncounted for #
            if (!empty($data->sub_command) && !in_array($data->sub_command, Self::$commands[$data->command])) throw new Exception("Sub Command is not recognized", 0);

            # sub_command # show given command help.
            if (!empty($data->sub_command)) {

                # params # show given command requirements help.
                if (!empty($data->params)) {

                    # do what you have to do.
                    // echo "CLI is to [{$data->sub_command}] a [{$data->command}] named ({$data->params})";

                    // IO handles all __callStatic => IO::{$sub_command}($params)
                    CLI::{$data->sub_command}($data->command, $data->params);

                    return;
                }
                die("Show [{$data->sub_command}] requirements.");
                # params # show given command requirements help.

                return;
            }
            die("Show [{$data->sub_command}] help.");
            # sub_command # show given command help.

            return;
        }
        die("List All Commands...");
    }


    # in arguments [scope={top_level_command}, params={data_to_manipulate}]
    private static function __callStatic($name, $arguments)
    {

        if (in_array($name, array_keys(Self::$commands))) {
                
            $subCommand = $arguments[0];
            $params     = $arguments[1];

            if ( empty($subCommand) || empty($params) ) die("[ERR] Missing Arguments.");

        }

        # error out
        die("[ERR] Command Not Recognized.");

    }
}
