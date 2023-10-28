<?php
require_once("includes/init.php");
if(!logged_in()){
    Helper::redirect("../login");
}
if (isset($_GET['brandID'])) {
    $brandID = Sanitizer::sanitizeInput($_GET['brandID']);
}

$like = new Likes($kon, $brandID);
$follow = new Follows($kon, $brandID);
$group = new Group($kon, $brandID);
$app = new App($kon, $brandID);
$completed = new Completed($kon, $brandID, $uid);
$brand = new Brand($kon, $brandID);
$brandType = $brand->type();
$price = $like->price() + $follow->price() + $group->price() + $app->price();

if(isset($_GET['comp'])){
    $added = $completed->add($brandType, $price);
    if($added){
        Helper::redirect("completed");
    }
}

if($completed->isCompleted()){
    Helper::redirect("completed");
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
    <title>Team Booster | Tasks</title>
</head>
<body class="main-body">
    <div class="loader-wrap d-none">
        <span class="loader"></span>
    </div>
    <header>
        <div class="header">
            <div class="logo"><a href="dashboard.php"><img src="./assets/img/logo.png" alt="logo" width="150"></a></div>
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
                        MTN Nigeria
                    </div>
                    <div class="card-body">
                        <div class="alert alert-primary" role="alert">
                            <?php if($follow->facebook() != '' || $follow->instagram() != '' || $follow->twitter() != '' || $follow->audiomack() != '' || $follow->youtube() != '' || $follow->tiktok() != '' || $follow->linkedin() != ''){ ?>
                            <div class="task-icons">
                                <small>Click the icon to like, follow of Subscribe - &#8358;<?= number_format($follow->price(),2) ?></small>
                                <div class="like-icons task-icons">
                                    <?php if($follow->facebook() != ''){?>
                                        <a href="<?= $follow->facebook() ?>" target="_blank">
                                            <img src="./assets/img/icons/facebook.png"  alt="icons" width="40">
                                        </a>
                                    <?php } ?>
                                    <?php if($follow->instagram() != ''){?>
                                        <a href="<?= $follow->instagram() ?>" target="_blank">
                                            <img src="./assets/img/icons/instagram.png"  alt="icons" width="40">
                                        </a>
                                    <?php } ?>
                                    <?php if($follow->twitter() != ''){?>
                                        <a href="<?= $follow->twitter() ?>" target="_blank">
                                            <img src="./assets/img/icons/twitter.png"  alt="icons" width="40">
                                        </a>
                                    <?php } ?>
                                    <?php if($follow->linkedin() != ''){?>
                                        <a href="<?= $follow->linkedin() ?>" target="_blank">
                                            <img src="./assets/img/icons/linkedin.png"  alt="icons" width="40">
                                        </a>
                                    <?php } ?>
                                    <?php if($follow->youtube() != ''){?>
                                        <a href="<?= $follow->youtube() ?>" target="_blank">
                                            <img src="./assets/img/icons/youtube.png"  alt="icons" width="40">
                                        </a>
                                    <?php } ?>
                                    <?php if($follow->tiktok() != ''){?>
                                        <a href="<?= $follow->tiktok() ?>" target="_blank">
                                            <img src="./assets/img/icons/tiktok.png"  alt="icons" width="40">
                                        </a>
                                    <?php } ?>
                                    <?php if($follow->audiomack() != ''){?>
                                        <a href="<?= $follow->audiomack() ?>" target="_blank">
                                            <img src="./assets/img/icons/audiomack.png"  alt="icons" width="40">
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <br>
                            <?php } ?>

                            <?php if($like->facebook() != '' || $like->instagram() != '' || $like->twitter() != '' || $like->audiomack() != '' || $like->youtube() != '' || $like->tiktok() != '' || $like->linkedin() != ''){ ?>
                            <div class="task-icons">
                                <small>Click the icon to like and comment on the post - &#8358;<?= number_format($like->price(),2) ?></small>
                                <div class="comment-icon task-icons">
                                    <?php if($like->facebook() != ''){?>
                                    <a href="<?= $like->facebook() ?>" target="_blank">
                                        <img src="./assets/img/icons/facebook.png" alt="icons" width="40">
                                    </a>
                                    <?php } ?>
                                    <?php if($like->instagram() != ''){?>
                                    <a href="<?= $like->instagram() ?>" target="_blank">
                                        <img src="./assets/img/icons/instagram.png" alt="icons" width="40">
                                    </a>
                                    <?php } ?>
                                    <?php if($like->twitter() != ''){?>
                                    <a href="<?= $like->twitter() ?>" target="_blank">
                                        <img src="./assets/img/icons/twitter.png" alt="icons" width="40">
                                    </a>
                                    <?php } ?>
                                    <?php if($like->linkedin() != ''){?>
                                    <a href="<?= $like->linkedin() ?>" target="_blank">
                                        <img src="./assets/img/icons/linkedin.png" alt="icons" width="40">
                                    </a>
                                    <?php } ?>
                                    <?php if($like->youtube() != ''){?>
                                    <a href="<?= $like->youtube() ?>" target="_blank">
                                        <img src="./assets/img/icons/youtube.png" alt="icons" width="40">
                                    </a>
                                    <?php } ?>
                                    <?php if($like->tiktok() != ''){?>
                                    <a href="<?= $like->tiktok() ?>" target="_blank">
                                        <img src="./assets/img/icons/tiktok.png" alt="icons" width="40">
                                    </a>
                                    <?php } ?>
                                    <?php if($like->audiomack() != ''){?>
                                    <a href="<?= $like->audiomack() ?>" target="_blank">
                                        <img src="./assets/img/icons/audiomack.png" alt="icons" width="40">
                                    </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <br>
                            <?php } ?>
                            
                            <?php if($group->facebook() != '' || $group->telegram() != '' || $group->whatsapp() != ''){ ?>
                            <div class="task-icons">
                                <small>Click the icon to join the group - &#8358;<?= number_format($group->price(),2) ?></small>
                                <div class="audiomack-icon task-icons">
                                    <?php if($group->telegram() != ''){?>
                                    <a href="<?= $group->telegram() ?>" target="_blank">
                                        <img src="./assets/img/icons/telegram.png" alt="icons" width="40">
                                    </a>
                                    <?php } ?>
                                    <?php if($group->whatsapp() != ''){?>
                                    <a href="<?= $group->whatsapp() ?>" target="_blank">
                                        <img src="./assets/img/icons/whatsapp.png" alt="icons" width="40">
                                    </a>
                                    <?php } ?>
                                    <?php if($group->facebook() != ''){?>
                                    <a href="<?= $group->facebook() ?>" target="_blank">
                                        <img src="./assets/img/icons/facebook.png" alt="icons" width="40">
                                    </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <br>
                            <?php } ?>

                            <?php if($app->playstore() != '' || $app->appstore() != ''){ ?>
                            <div class="task-icons">
                                <small>Click the icon to Download and preview app - &#8358;<?= number_format($app->price(),2) ?></small>
                                <div class="audiomack-icon task-icons">
                                    <?php if($app->playstore() != ''){?>
                                    <a href="<?= $app->playstore() ?>" target="_blank">
                                        <img src="./assets/img/icons/playstore.png" alt="icons" width="40">
                                    </a>
                                    <?php } ?>
                                    <?php if($app->appstore() != ''){?>
                                    <a href="<?= $app->appstore() ?>" target="_blank">
                                        <img src="./assets/img/icons/appstore.png" alt="icons" width="40">
                                    </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <br>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="p-3">
                        <a onclick="return confirm('Are you sure you completed this tasks?')" href="tasks?brandID=<?= $brandID ?>&comp" class="btn btn-primary">I have completed this task</a>
                    </div>
                  </div>
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
    <script src="./assets/js/content.js"></script>
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