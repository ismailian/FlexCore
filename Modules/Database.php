<?php

use Illuminate\Database\Capsule\Manager as Capsule;


class Connector
{

    public function __construct()
    {

        $capsule = new Capsule();
        $capsule->addConnection([
            'driver'    => Config::database()->driver,
            'host'      => Config::database()->hostname,
            'username'  => Config::database()->username,
            'password'  => Config::database()->password,
            'database'  => Config::database()->database,
            'charset'   => Config::database()->charset,
            'collation' => Config::database()->collation,
            'prefix'    => Config::database()->prefix
        ]);

        $capsule->bootEloquent();
    }
}
