<?php
require_once "db_config.php";


// ************PDO connection************
try {
	$kon = new PDO("mysql:host=".HOST.";dbname=".DBNAME."","".DBUSER."","".DBPASS."");
} catch (PDOException $e) {
	$errorDate = date("F j Y, g:i a");
	$errorMsg = "cannot connect: " . $e->getMessage();
	$msg = "$errorMsg | $errorDate \r\n";
	file_put_contents("db-log.txt", $msg, FILE_APPEND);
	return false;
}

// ****************initialization****************
date_default_timezone_set('Africa/Lagos');
// error_reporting(0);
