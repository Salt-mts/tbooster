<?php
require_once "includes/init.php";
require_once "includes/functions.php";

// register completed task
if(isset($_POST['price']) && isset($_POST['bid'])){
    $brandID = Sanitizer::sanitizeInput($_POST['bid']);
    $price = Sanitizer::sanitizeInput($_POST['price']);
    $brandType = Sanitizer::sanitizeInput($_POST['type']);
	$image = $_FILES['proof'];
	// var_dump($image);
// exit();
	$target_dir = "./assets/img/proof/";
	$imageFileType = strtolower(pathinfo($image['name'],PATHINFO_EXTENSION));
	$imgName = Helper::randomString(10).'.'.$imageFileType;
	$target_file = $target_dir . $imgName;

	$completed = new Completed($kon, $brandID, $uid);
	if($completed->isCompleted()){
		echo 1;
	}else{
		if(uploadImage($image, $imageFileType)){
			if(move_uploaded_file($image["tmp_name"], $target_file)) {
				$added = $completed->add($brandType, $price, $imgName);			
				if($added){
					echo 1;
				}	
			}
		}
	}
}


if(isset($_POST['payout'])){
	$done = $user->setUnpaidAsPending($uid);
	if($done){
		echo 1;
	}
}


?>