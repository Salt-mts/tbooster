<?php

require_once("account/includes/init.php");

if(isset($_POST['loginEmail'])  && isset($_POST['loginPass'])){
    $email = Sanitizer::sanitizeInput($_POST['loginEmail']);
    $password = Sanitizer::sanitizeInput($_POST['loginPass']); 


    $query = $kon->prepare("SELECT * FROM users WHERE email = :em");
    $query->bindParam(":em", $email);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    if($row['password'] === $password){
        echo 1;
        $_SESSION['tboostLogin'] = $email;
        setcookie("tboostLogin", $email, time() + (86400), "/");
    }else{
        echo "Invalid Login Details!";
    }
}