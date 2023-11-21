<?php
require_once("includes/init.php");
if(!logged_in()){
    Helper::redirect("../login");
}

if($user->bank() != ''){
    Helper::redirect("profile");
}

if(isset($_POST['updatebnk'])){
    $fname = Sanitizer::sanitizeInput($_POST['fname']);
    $bank = Sanitizer::sanitizeInput($_POST['bank']);
    $acctno = Sanitizer::sanitizeInput($_POST['acctno']);

    if(empty($fname) || empty($bank) || empty($acctno)){
        $msg = "All fields are required";
    }else{
        $done = $user->updateBank($fname, $bank, $acctno);
        if($done){
            Helper::redirect('./profile');
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
                      <h6>Add Bank Account</h6>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="py-2"><?= @$msg ?></div>

                            <input type="text" placeholder="Full names" class="my-3 form-control" value="<?= $user->fullname() ?>"  name="fname" required>

                            <input type="text" placeholder="Bank name" class="my-3 form-control" name="bank" required>

                            <input type="text" placeholder="Account number" class="my-3 form-control" name="acctno" required>

                            <p class="alert alert-danger"><small><i>Enter a correct account details, you cannot edit your account details after submission.</i></small></p>

                            <button class="btn btn-sm btn-my" type="submit" name="updatebnk">Send</button>
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