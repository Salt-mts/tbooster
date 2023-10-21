<?php
require_once "includes/init.php";
function sanitizeInput($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = strtolower($data);
	return $data;
}

if(isset($_POST['marital']) && isset($_POST['nin'])){
	$fname = sanitizeInput($_POST['fname']);
	$abssin = sanitizeInput($_POST['abssin']);
	$nin = sanitizeInput($_POST['nin']);
	$phone = sanitizeInput($_POST['phone']);
	$email = sanitizeInput($_POST['email']);
	$marital = sanitizeInput($_POST['marital']);
	$date_added = date("F d, Y - g:i a");

	if(empty($fname) || empty($abssin) || empty($nin) || empty($phone) || empty($email)){
		echo "All fields are required";
		exit();
	}elseif(strlen($fname) < 5){
		echo "Enter your full names";
		exit();
	}elseif(!is_numeric($nin)){
		echo "Enter a valid NIN/BVN";
		exit();
	}elseif(strlen($nin) < 10){
		echo "Enter a valid NIN/BVN";
		exit();
	}elseif(!is_numeric($phone)){
		echo "Enter a valid phone number";
		exit();
	}elseif(strlen($phone) < 10){
		echo "Enter a valid phone number";
		exit();
	}else{
		$insert = $kon->prepare("INSERT INTO agents(fname, abssin, nin, phone, email, marital, date_added) VALUES(:fn, :ab, :nin, :ph, :em, :ma, :dt)");
		$insert->bindParam("fn", $fname);
		$insert->bindParam("ab", $abssin);
		$insert->bindParam("nin", $nin);
		$insert->bindParam("ph", $phone);
		$insert->bindParam("em", $email);
		$insert->bindParam("ma", $marital);
		$insert->bindParam("dt", $date_added);
		$done = $insert->execute();
		if($done){
			echo 1;
		}
	}
}

elseif(isset($_POST['msg']) && isset($_POST['itype'])){
	$fname = sanitizeInput($_POST['fname']);
	$email = sanitizeInput($_POST['email']);
	$itype = sanitizeInput($_POST['itype']);
	$msg = sanitizeInput($_POST['msg']);
	$date_added = date("F d, Y - g:i a");

	if(empty($fname) || empty($email) || empty($msg)){
		echo "All fields are required";
		exit();
	}elseif(strlen($fname) < 5){
		echo "Enter your full names";
		exit();
	}elseif(strlen($msg) < 10){
		echo "Properly describe the challenges you're having";
		exit();
	}else{
		$insert = $kon->prepare("INSERT INTO issues(fname,email, itype, msg, date_added) VALUES(:fn, :em, :ty, :msg, :dt)");
		$insert->bindParam("fn", $fname);
		$insert->bindParam("em", $email);
		$insert->bindParam("ty", $itype);
		$insert->bindParam("msg", $msg);
		$insert->bindParam("dt", $date_added);
		$done = $insert->execute();
		if($done){
			echo 1;
		}
	}
}

else{
	header("Location : index");
	exit();
}