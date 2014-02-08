<?php
    include_once 'models/db.php';
    if ( file_exists( 'config/config-local.php' ) ) {
        include_once 'config/config-local.php';
    }
    else {
        include_once 'config/config.php';
    }
    include_once 'models/database.php';
    include_once 'models/base.php';
    include_once 'models/user.php';
    include_once 'controllers/base.php';
    include_once 'helpers/html.php';
    include_once 'helpers/pluralize.php';
?>
