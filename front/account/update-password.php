<?php
require_once("includes/init.php");
if(!logged_in()){
    Helper::redirect("../login");
}

if(isset($_POST['update'])){
    $opass = Sanitizer::sanitizeInput($_POST['opass']);
    $npass = Sanitizer::sanitizeInput($_POST['npass']);
    $cpass = Sanitizer::sanitizeInput($_POST['cpass']);

    if(empty($opass) || empty($npass) || empty($cpass)){
        $msg = "All fields are required";
    }elseif(strlen($npass) < 6){
        $msg = "Password must be 6 character and above";
    }elseif($npass != $cpass){
        $msg = "Password doesn't match";
    }elseif(!$user->verifyPassword($opass)){
        $msg = "Incorrect password";
    }else{
        $done = $user->updatePassword($npass);
        if($done){
            Helper::redirect('./update-success.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
    <title>Team Booster | Update Password</title>
</head>
<body class="main-body">
    <div class="loader-wrap d-none">
        <span class="loader"></span>
    </div>
    <header>
        <div class="header">
            <div class="logo"><a href="dashboard"><img src="./assets/img/logo.png" alt="logo" width="150"></a></div>
            <div class="hamburger">
                <button class="btn menu-btn">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </header>
    <section class="main-content">
        <div class="container">
            <div class="user-profile pb-4">
                <?php require_once("includes/components/widget.php"); ?>
            </div>
            <div class="engage">
                <div class="card">
                    <div class="card-header">
                      Update Password
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="py-2"><?= @$msg ?></div>
                            <input type="password" placeholder="Current Password" class="my-3 form-control" name="opass" required>
                            <input type="password" placeholder="New Password" class="my-3 form-control" name="npass" required>
                            <input type="password" placeholder="Confirm Password" class="my-3 form-control" name="cpass required">
                            <button class="btn btn-primary" type="submit" name="update">Send</button>
                        </form>
                    </div>
                </div>
                <div></div>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer">
          <p>  &copy; <span class="fyear"></span> Team Booster</p>
        </div>
    </footer>
    <div class="menu d-none">
        <button class="btn close-menu"><i class="fa-solid fa-times"></i></button>
        <div class="menu-items">
            <?php require_once("includes/components/menu.php"); ?>
        </div>
    </div>
    <div class="menu-bg d-none"></div>

    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/main.js"></script> 
</body>
</html>