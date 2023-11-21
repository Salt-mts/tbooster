<?php
    require_once "includes/init.php";
    require_once "includes/functions.php";
    define("PAGE", "settings");
    if(!logged_in()){
    header("Location: login");
    exit();
    }

    if(isset($_GET['success'])){
        echo "<script>alert('Successful')</script>";
    }

    


    if (isset($_POST['sendPass'])) {
        $password = Sanitizer::sanitizeInput($_POST['password']);
        $cpassword = Sanitizer::sanitizeInput($_POST['cpassword']);
                
        if(strlen($password)< 8){
            $pError = "<p class='alert alert-danger'>Password must contain 8 characters or more</p>";
        }
        elseif($password !== $cpassword){
            $pError = "<p class='alert alert-danger'>Password doesn't match</p>";
        }
        else{
            $query = $kon->prepare("UPDATE admins SET password = :pass WHERE id = 1");
            $query->bindParam(":pass", $password);
            $done = $query->execute();
            if($done){
                Helper::redirect("settings?success");
            }
        }
    }

    if (isset($_POST['sendRef'])) {
        $ref = Sanitizer::sanitizeInput($_POST['ref']);
                
        if(!is_numeric($ref)){
            $error = "<p class='alert alert-danger'>Enter a valid number</p>";
        }
        elseif($ref < 1){
            $error = "<p class='alert alert-danger'>Amount must be 1 or more</p>";
        }
        else{
            $query = $kon->prepare("UPDATE settings SET referrer = :amt WHERE id = 1");
            $query->bindParam(":amt", $ref);
            $done = $query->execute();
            if($done){
                Helper::redirect("settings?success");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <title>Team Booster | Admin</title>
</head>
<body>
    <nav>
        <div class="header-container">
            <div class="header-content-left">
                <div class="header-left-item light-text hamburger">
                    <button class="transparent-btn open-menu"><i class="fas fa-bars"></i></button>
                    <button class="transparent-btn close-menu hidden"><i class="fas fa-times"></i></button>
                </div>
                <div class="header-left-item sm-d-none"><a href="#"><img src="./assets/img/logo.png" width="120"></a></div>
            </div>
            <div class="header-content-right">
                <div class="header-right-item">
                    <button class="transparent-btn notify-btn light-text"><i class="fas fa-bell"></i></button>
                    <div class="notification-dropdown hidden">
                        <p><i><small>No Notification</small></i></p>
                    </div>
                </div>
                <div class="margin-x-20 sm-d-none"></div>
                <div class="header-right-item sm-d-none">
                    <div class="trans_logo">AD</div>
                    <div class="nav_name">Admin</div>
                </div>
            </div>
        </div>
    </nav>
    <div class="notification-dropdown-bg hidden"></div>

    <div class="dashboard__main">
        <div class="dashboard__main__sidebar">
            <?php require_once "includes/components/sideMenu.php"; ?>
        </div>
        <div class="dashboard__main__content">
            <div class="dashboard__main__content__container">
                <div class="dashboard__main__content__row">
                    <div class="dashboard__main__content__row__item">
                        <h1 class="dashboard__main__content__pagetitle">Settings</h1> 
                        <p class="dashboard__main__content__pagecaption light-text">
                            
                        </p>
                    </div>
                    <div class="settings__main__content__body">
                        <div class="Add-product bg-white p-4">
                            <div class="my-3">
                                <div class="d-flex gap-2">
                                    Referral Bonus:
                                    <span>	&#8358;<?= refBonus() ?></span>
                                </div>

                                <div class="mt-5">
                                    <form action="" method="POST">
                                        <?= @$error ?>
                                    <input type="hidden" id="ref" name="ref" min="1" placeholder="Enter referrer amount" class="form-control" required>
                                    <br>
                                    <button name="sendRef" type="submit" id="refSub" class="btn btn-sm btn-success d-none">Change Password</button>
                                    </form>
                                </div>

                                <div class="d-flex gap-3 mt-3">
                                    <button id="ref-btn" class="btn btn-sm btn-success">Set Referral Bunus</button>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="Add-product bg-white p-4">
                            <h4>Change Password</h4>
                            <div class="my-3">
                                <form action="" method="POST">
                                <?= @$pError ?>
                                    <input type="password" name="password" placeholder="Enter Password" class="form-control" required> <br>
                                    <input type="password" name="cpassword" placeholder="Confirm Password" class="form-control" required> <br>
                                    <button id="pass-btn" name="sendPass" type="submit" class="btn btn-sm btn-primary">Change Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const ref = document.getElementById("ref")
        const refSub = document.getElementById("refSub")
        const refbtn = document.getElementById("ref-btn")

        refbtn.onclick = ()=>{
            showRef()
        }

        function showRef(){
            ref.type = "number"
            refSub.classList.remove("d-none")
            refbtn.classList.add("d-none")
        }
    </script>
    <script src="./assets/js/main.js"></script>
</body>
</html>