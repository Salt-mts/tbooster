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
                    <div class="card-header">
                      Profile
                    </div>
                    <div class="card-body">
                        <div class="d-flex gap-3">
                            <p>Names:</p>
                            <p><?= $fullname ?></p>
                        </div>
                        <div class="d-flex gap-3">
                            <p>Email:</p>
                            <p><?= $email ?></p>
                        </div>
                        <div class="d-flex gap-3">
                            <p>Job type:</p>
                            <p><?= $user->schedule() ?></p>
                        </div>
                        <div class="d-flex gap-3">
                            <p>Current Earnings:</p>
                            <p><?= $user->totalUnpaid($uid) ?></p>
                        </div>
                        <div class="d-flex gap-3">
                            <p>Total Earnings:</p>
                            <p><?= $user->totalPaid($uid) ?></p>
                        </div>
                        <div class="py-3">
                            <a class="text-primary" href="./update-password">Change password</a>
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

    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script>
        /*
        const agentForm = document.getElementById("agent-form")
        agentForm.onsubmit = (e)=>{
            e.preventDefault()
            showLoader()
            ajax = new XMLHttpRequest()
            ajax.onload = ()=>{
                if(ajax.readyState == 4 && ajax.status == 200){
                    if(parseInt(ajax.responseText)==1){
                        hideLoader()
                        notifyUser("success", "Successful");
                        agentForm.reset()
                    }else{
                        hideLoader()
                        notifyUser("danger", ajax.responseText);
                    }
                }
            }
            ajax.open("POST", "process.php", true)
            const formData = new FormData(agentForm);
            // console.log(formData)
            ajax.send(formData)
        }
        */
    </script>   
</body>
</html>