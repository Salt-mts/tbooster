<?php

require_once("account/includes/init.php");

if(isset($_POST['loginEmail'])  && isset($_POST['loginPass'])){
    $email = Sanitizer::sanitizeInput($_POST['loginEmail']);
    $password = Sanitizer::sanitizeInput($_POST['loginPass']); 


    $query = $kon->prepare("SELECT * FROM users WHERE email = :em");
    $query->bindParam(":em", $email);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    if($query->rowCount() == 1){
        if($row['password'] === md5($password)){
            echo 1;
            $_SESSION['tboostLogin'] = $email;
            setcookie("tboostLogin", $email, time() + (86400), "/");
        }else{
            echo "Invalid Login Details!";
        }
    }else{
        echo "Invalid Login Details!";
    }
}



if(isset($_POST['fname'])  && isset($_POST['phone'])){
   $fname = Sanitizer::sanitizeInput($_POST['fname']);
    $email = Sanitizer::sanitizeInput($_POST['email']); 
    $phone = Sanitizer::sanitizeInput($_POST['phone']); 
    $jobpass = Sanitizer::sanitizeInput($_POST['jobpass']); 
    $password = Sanitizer::sanitizeInput($_POST['password']); 
    $cpassword = Sanitizer::sanitizeInput($_POST['cpassword']); 
    $schedule = Sanitizer::sanitizeInput($_POST['schedule']); 
    $ref = Sanitizer::sanitizeInput($_POST['referrer']); 
    $rLink = Helper::randomString(10);

    $date = Helper::date();
   
    $pass = new Pass($kon, $jobpass);

    if(empty($fname) || empty($email) || empty($phone) || empty($password) || empty($schedule)){
        echo "All fields are required";
        exit();
    }elseif (strlen($password) < 6) {
        echo "Password must be 6 characters or more";
        exit();
    }elseif ($password !== $cpassword) {
        echo "Password doesn't match";
        exit();
    }elseif (!$pass->passExist()) {
        echo "Invalid Job Pass";
        exit();
    }elseif ($pass->isUsed()) {
        echo "Job Pass already used";
        exit();
    }else{
        $password = md5($password);
        $query = $kon->prepare("INSERT INTO users(email, password, schedule, fullname, jobpass, date_added, referral_link, referrer) VALUES(:em, :pw, :sch, :fn, :jp, :dt, :refl, :refr)");
        $query->bindParam(":em", $email);
        $query->bindParam(":pw", $password);
        $query->bindParam(":sch", $schedule);
        $query->bindParam(":fn", $fname);
        $query->bindParam(":jp", $jobpass);
        $query->bindParam(":dt", $date);
        $query->bindParam(":refl", $rLink);
        $query->bindParam(":refr", $ref);
        $done = $query->execute();
        if($done){
            echo 1;
        }else{
            echo "Something went wrong";
        }        
    }

}