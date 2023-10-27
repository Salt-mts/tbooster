<?php
    require_once "includes/init.php";
    require_once "includes/functions.php";
    define("PAGE", "addtask");
    if(!logged_in()){
    header("Location: login");
    exit();
    }
    if(isset($_GET['upd'])){
        echo "<script>alert('Successful')</script>";
    }

    if (isset($_GET['brandID'])) {
        $brandID = Sanitizer::sanitizeInput($_GET['brandID']);
    }

    $brand = new Brand($kon, $brandID);
    $follow = new Follows($kon, $brandID);
    $like = new Likes($kon, $brandID);    
    $app = new App($kon, $brandID);
    $group = new Group($kon, $brandID);
    $posting = new Posting($kon, $brandID);

    if(isset($_GET['delBrand'])){
       $deleted = $brand->deleteBrand();

       if($deleted){
        Helper::redirect("engage");
       }
    }

    if(isset($_GET['deact'])){
       $deactivate = $brand->deactivateBrand();

       if($deactivate){
        Helper::redirect("others?brandID=$brandID&upd=Successful");
       }
    }

    if(isset($_GET['act'])){
       $activate = $brand->activateBrand();

       if($activate){
        Helper::redirect("others?brandID=$brandID&upd=Successful");
       }
    }

    if (isset($_POST['follow'])) {
        $facebook = Sanitizer::sanitizeInput($_POST['ffacebook']);
        $instagram = Sanitizer::sanitizeInput($_POST['finstagram']);
        $twitter = Sanitizer::sanitizeInput($_POST['ftwitter']);
        $youtube = Sanitizer::sanitizeInput($_POST['fyoutube']);
        $linkedin = Sanitizer::sanitizeInput($_POST['flinkedin']);
        $tiktok = Sanitizer::sanitizeInput($_POST['ftiktok']);
        $audiomack = Sanitizer::sanitizeInput($_POST['faudiomack']);
        $price = Sanitizer::sanitizeInput($_POST['fprice']);


        $done = $brand->updateFollow($facebook, $instagram, $youtube, $twitter, $tiktok, $linkedin, $audiomack, $price);
        if($done){
            Helper::redirect("others?brandID=$brandID&upd=Successful");
        }else{
            $followError = "Something went wrong! Try again.";
        }
    }

    if (isset($_POST['like'])) {
        $facebook = Sanitizer::sanitizeInput($_POST['facebook']);
        $instagram = Sanitizer::sanitizeInput($_POST['instagram']);
        $twitter = Sanitizer::sanitizeInput($_POST['twitter']);
        $youtube = Sanitizer::sanitizeInput($_POST['youtube']);
        $linkedin = Sanitizer::sanitizeInput($_POST['linkedin']);
        $tiktok = Sanitizer::sanitizeInput($_POST['tiktok']);
        $audiomack = Sanitizer::sanitizeInput($_POST['audiomack']);
        $price = Sanitizer::sanitizeInput($_POST['price']);


        $done = $brand->updateLike($facebook, $instagram, $youtube, $twitter, $tiktok, $linkedin, $audiomack, $price);
        if($done){
            Helper::redirect("others?brandID=$brandID&upd=Successful");
        }else{
            $likeError = "Something went wrong! Try again.";
        }
    }

    if (isset($_POST['download'])) {
        $playstore = Sanitizer::sanitizeInput($_POST['playstore']);
        $appstore = Sanitizer::sanitizeInput($_POST['appstore']);
        $price = Sanitizer::sanitizeInput($_POST['aprice']);


        $done = $brand->updateApp($playstore, $appstore, $price);
        if($done){
            Helper::redirect("others?brandID=$brandID&upd=Successful");
        }else{
            $dwnError = "Something went wrong! Try again.";
        }
    }

    if (isset($_POST['group'])) {
        $telegram = Sanitizer::sanitizeInput($_POST['telegram']);
        $whatsapp = Sanitizer::sanitizeInput($_POST['whatsapp']);
        $facebook = Sanitizer::sanitizeInput($_POST['gfacebook']);
        $price = Sanitizer::sanitizeInput($_POST['gprice']);


        $done = $brand->updateGroup($telegram, $whatsapp, $facebook, $price);
        if($done){
            Helper::redirect("others?brandID=$brandID&upd=Successful");
        }else{
            $dwnError = "Something went wrong! Try again.";
        }
    }

    if (isset($_POST['posting'])) {
        $link = Sanitizer::sanitizeInput($_POST['posting-link']);
        $price = Sanitizer::sanitizeInput($_POST['pprice']);


        $done = $brand->updatePosting($link, $price);
        if($done){
            Helper::redirect("others?brandID=$brandID&upd=Successful");
        }else{
            $dwnError = "Something went wrong! Try again.";
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
                        <h1 class="dashboard__main__content__pagetitle">
                   <img src="./assets/img/brand/<?= $brand->logo() ?>" alt="<?= $brand->name() ?>" width="40"> <?= $brand->name() ?></h1> 
                        <p class="dashboard__main__content__pagecaption" style="display: flex; justify-content: end;">
                            <?php if($brand->isActive()){ ?>
                                <a href="?brandID=<?= $brandID ?>&deact" class="btn btn-danger">Deactivate this Brand</a>
                            <?php }else{ ?>
                                <a href="?brandID=<?= $brandID ?>&act" class="btn btn-success">Activate this Brand</a>
                            <?php } ?>
                        </p>
                    </div>
                    <div class="settings__main__content__body">
                        <div class="Add-product bg-white p-4">
                            <h5>Page Follow/Subscription tasks</h5>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <!-- <label for="pname" class="form-label">Facebook</label> -->
                                    <input type="text" class="form-control" name="ffacebook" placeholder="Facebook Link" value="<?= @$follow->facebook() ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="finstagram" placeholder="Instagram Link" value="<?= @$follow->instagram() ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="ftwitter" placeholder="Twitter Link" value="<?= @$follow->twitter() ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="fyoutube" placeholder="YouTube Link" value="<?= @$follow->youtube() ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="flinkedin" placeholder="Linkedin Link" value="<?= @$follow->linkedin() ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="ftiktok" placeholder="TikTok Link" value="<?= @$follow->tiktok() ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="faudiomack" placeholder="Audiomack Link" value="<?= @$follow->audiomack() ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="number" class="form-control" name="fprice" min="1" step="0.01" placeholder="Amount to pay" value="<?= @$follow->price() ?>">
                                </div>
                                  <div class="mb-3">
                                    <button type="submit" name="follow" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>


                    <br> <br>
                    <div class="settings__main__content__body">
                        <div class="Add-product bg-white p-4">
                            <h5>Post Like/Comment tasks</h5>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <!-- <label for="pname" class="form-label">Facebook</label> -->
                                    <input type="text" class="form-control" name="facebook" placeholder="Facebook Link" value="<?= @$like->facebook() ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="instagram" placeholder="Instagram Link" value="<?= @$like->instagram() ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="twitter" placeholder="Twitter Link" value="<?= @$like->twitter() ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="youtube" placeholder="YouTube Link" value="<?= @$like->youtube() ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="linkedin" placeholder="Linkedin Link" value="<?= @$like->linkedin() ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="tiktok" placeholder="TikTok Link" value="<?= @$like->tiktok() ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="audiomack" placeholder="Audiomack Link" value="<?= @$like->audiomack() ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="number" class="form-control" name="price" min="1" step="0.01" placeholder="Amount to pay" value="<?= @$like->price() ?>">
                                </div>
                                  <div class="mb-3">
                                    <button type="submit" name="like" class="btn btn-warning">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <br> <br>
                    <div class="settings__main__content__body">
                        <div class="Add-product bg-white p-4">
                            <h5>App Download tasks</h5>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <!-- <label for="pname" class="form-label">Facebook</label> -->
                                    <input type="text" class="form-control" name="playstore" placeholder="Google Playstore Link" value="<?= @$app->playstore() ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="appstore" placeholder="Apple Store Link" value="<?= @$app->appstore() ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="number" class="form-control" name="aprice" min="1" step="0.01" placeholder="Amount to pay" value="<?= @$app->price() ?>">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="download" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <br> <br>
                    <div class="settings__main__content__body">
                        <div class="Add-product bg-white p-4">
                            <h5>Join Group</h5>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="telegram" placeholder="Telegram Group Link" value="<?= @$group->telegram() ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="whatsapp" placeholder="Whatsapp Group Link" value="<?= @$group->whatsapp() ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="gfacebook" placeholder="Facebook Group Link" value="<?= @$group->facebook() ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="number" class="form-control" name="gprice" min="1" step="0.01" placeholder="Amount to pay" value="<?= @$group->price() ?>">
                                </div>
                                  <div class="mb-3">
                                    <button type="submit" name="group" class="btn btn-secondary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br><br>
                    <div class="brand-action" style="display: flex; justify-content: end;">
                        <a href="others?brandID=<?= $brandID ?>&delBrand=" onclick="return confirm('Sure to delete?')" class="btn btn-muted">Delete this Brand</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets/js/main.js"></script>
</body>
</html>