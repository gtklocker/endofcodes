<?php
    $config = getConfig();
    mysql_connect( $config[ 'db' ][ 'host' ], $config[ 'db' ][ 'user' ], $config[ 'db' ][ 'pass' ] );
    mysql_select_db( $config[ 'db' ][ 'dbname' ] );
?>
