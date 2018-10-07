<?php

//https://stackoverflow.com/questions/3644600/php-include-best-practices-question

/*
 * DEFINE Local Paths
 */
define('DIR_BASE',      dirname( dirname( __FILE__ ) ) . '\\');
define('DIR_CORE',    DIR_BASE . 'core\\');

include_once(DIR_CORE . "settings.config.php");
include_once(DIR_CORE . "db.conn.php");