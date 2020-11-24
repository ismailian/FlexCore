<?php

use App\Modules\Connector;
use App\Handlers\Login;
use App\Handlers\Register;
use App\Handlers\Logout;
use App\Handlers\Fetch;
use App\Handlers\Create;
use App\Handlers\Update;
use App\Handlers\Delete;
use App\Handlers\Export;

# database
$capsule = new Connector();

# session
Sessioneer::guest();


##########################################################
############### Initialize all handlers ##################
##########################################################
Login::Init();     # Login users.
Logout::Init();    # Logout users.
Register::Init();  # Register new entries.

Fetch::Init();     # Fetch data from database.
Create::Init();    # Insert into database.
Update::Init();    # Update to database.
Delete::Init();    # Delete from database.

Export::Init();    # Export Files. 