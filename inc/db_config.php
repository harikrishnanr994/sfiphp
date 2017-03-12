<?php
/**
 * Database configuration
 */
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', 'localhost');
define('DB_NAME', 'sfi');

/**
 * Database connection
 */
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die ("connection failed");
?>
