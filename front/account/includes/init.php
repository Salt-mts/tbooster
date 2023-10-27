<?php
require_once "db_config.php";


// *************load all classes (autoload)****************
spl_autoload_register(function($class_name){
	include "classes/$class_name.php";
});


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


function logged_in(){
	if (isset($_SESSION['tboostLogin'])) {	
		return true;
	}elseif(isset($_COOKIE['tboostLogin'])){
        $_SESSION['tboostLogin'] = $_COOKIE['tboostLogin'];
        return true;
    }else{
		return false;
	}
}

if(logged_in()){
	$email = $_SESSION['tboostLogin'];
	$user = new User($kon, $email);
	$uid = $user->id();
	$fullname = $user->fullname();
	$schedule = $user->schedule();
}
// ******************logout function******************
function logout(){
	session_destroy();
	setcookie("tboostLogin", "", time() - (86400 * 1), "/");
	Helper::redirect("../login");
}

if(isset($_GET["logout"])){
	logout();
}