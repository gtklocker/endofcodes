<?php
    include_once 'migrate.php';

    migrate(
        [
            "CREATE TABLE IF NOT EXISTS
                `countries` (
                    `id` int(4) NOT NULL AUTO_INCREMENT,
                    `country` text COLLATE utf8_unicode_ci NOT NULL,
                    `shortname` text COLLATE utf8_unicode_ci NOT NULL,
                    PRIMARY KEY (`id`)
                )
                ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;",
            "ALTER TABLE
                `users`
            ADD COLUMN
                `countryid` int(4) unsigned NOT NULL;"
        ]
    );
?>
