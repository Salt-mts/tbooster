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
        Helper::redirect("posting?brandID=$brandID&upd=Successful");
       }
    }

    if(isset($_GET['act'])){
       $activate = $brand->activateBrand();

       if($activate){
        Helper::redirect("posting?brandID=$brandID&upd=Successful");
       }
    }

    if (isset($_POST['posting'])) {
        $link = Sanitizer::sanitizeInput($_POST['posting-link']);
        $price = Sanitizer::sanitizeInput($_POST['pprice']);


        $done = $brand->updatePosting($link, $price);
        if($done){
            Helper::redirect("posting?brandID=$brandID&upd=Successful");
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

                    <br> <br>
                    <div class="settings__main__content__body">
                        <div class="Add-product bg-white p-4">
                            <h5>Posting Task</h5>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <textarea class="form-control" name="posting-link" rows="3" placeholder="Enter link to post"><?= @$posting->link() ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <input type="number" class="form-control" name="pprice" min="1" step="0.01" placeholder="Amount to pay" value="<?= @$posting->price() ?>">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="posting" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <br><br>
                    <div class="brand-action" style="display: flex; justify-content: end;">
                        <a href="posting?brandID=<?= $brandID ?>&delBrand=" onclick="return confirm('Sure to delete?')" class="btn btn-muted">Delete this Brand</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets/js/main.js"></script>
</body>
</html>