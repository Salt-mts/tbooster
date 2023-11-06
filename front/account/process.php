<?php
require_once "includes/init.php";

// register completed task
if(isset($_POST['price']) && isset($_POST['bid'])){
    $brandID = Sanitizer::sanitizeInput($_POST['bid']);
    $price = Sanitizer::sanitizeInput($_POST['price']);
    $brandType = Sanitizer::sanitizeInput($_POST['type']);

	$completed = new Completed($kon, $brandID, $uid);

	if($completed->isCompleted()){
		echo 1;
	}else{
		$added = $completed->add($brandType, $price);
	
		if($added){
			echo 1;
		}		
	}
}