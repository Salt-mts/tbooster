<?php
require_once("includes/init.php");
if(!logged_in()){
    Helper::redirect("../login");
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
    <title>Team Booster | Profile</title>
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
                    <div class="card-header text-light bg-primary">
                      <h5>Profile</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex gap-2">
                            <p>Names:</p>
                            <p><?= $fullname ?></p>
                        </div>
                        <div class="d-flex gap-2">
                            <p>Email:</p>
                            <p><?= $email ?></p>
                        </div>
                        <div class="d-flex gap-2">
                            <p>Job type:</p>
                            <p><?= $user->schedule() ?></p>
                        </div>
                        <div class="d-flex gap-2">
                            <p>Current Earnings:</p>
                            <p>
                                <?= number_format($user->totalUnpaid($uid), 2) ?>
                                <?= $user->canCashOut($uid)?'
                                <span><button id="payout" class="btn btn-sm btn-warning">Pay out</button></span>':''; ?>
                            </p>
                        </div>
                        <div class="d-flex gap-2">
                            <p>Pending Payment:</p>
                            <p>
                                <?= number_format($user->totalPendingPayment($uid), 2) ?>
                            </p>
                        </div>
                        <div class="d-flex gap-2">
                            <p>Total Earnings:</p>
                            <p><?= number_format($user->totalPaid($uid), 2) ?> </p>
                        </div>
                        <div class="d-flex gap-2">
                            <p>Referral code:</p>
                            <p><?= $user->referral() ?> </p>
                        </div>
                        <div class="d-flex gap-2">
                            <p>Referral Link:</p>
                            <p style="padding:7px;background-color:#f5f5f5;"><?= Helper::site_url().'register?ref='. $user->referral() ?> </p>
                        </div>
                        <div class="d-flex gap-2">
                            <p>Bank name:</p>
                            <p><?= $user->bank() ?> </p>
                        </div>
                        <div class="d-flex gap-2">
                            <p>Account number:</p>
                            <p><?= $user->acctNo() ?> </p>
                        </div>
                        <div class="d-flex gap-2">
                            <p>Referrals:</p>
                            <p><?= $user->countReferred() ?> </p>
                        </div>
                        <div class="py-3 d-flex gap-4">
                            <?= $user->bank() == ''?'<a class="btn btn-sm btn-warning" href="./update-bank">Add Bank Account</a>':''; ?>
                            <a class="btn btn-sm btn-my" href="./update-password">Change password</a>
                        </div>
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

    <!-- alert -->
    <div class="notify"></div>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script>
        
        const payOut = document.getElementById("payout")
        payOut.onclick = (e)=>{
            e.preventDefault()
            showLoader()
            ajax = new XMLHttpRequest()
            ajax.onload = ()=>{
                if(ajax.readyState == 4 && ajax.status == 200){
                    if(parseInt(ajax.responseText)==1){
                        hideLoader()
                        notifyUser("success", "Successful");
                        location.reload()
                    }else{
                        hideLoader()
                        notifyUser("danger", "Not successful! Try again");
                    }
                }
            }
            ajax.open("POST", "process.php", true)
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.send("payout")
        }
    </script>   
</body>
</html>