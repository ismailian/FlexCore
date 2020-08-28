<?php

## database ##
$capsule = new Connector();

## session ##
Sessioneer::guest();


##########################################################
############### Initialize all handlers ##################
##########################################################
Login::Start();     # Login users.
Logout::Start();    # Logout users.
Register::Start();  # Register new entries.

Fetch::Start();     # Fetch data from database.
Create::Start();    # Insert into database.
Update::Start();    # Update to database.
Delete::Start();    # Delete from database.

Export::Start();    # Export Files. 