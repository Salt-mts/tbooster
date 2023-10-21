<?php
    require_once "includes/init.php";
    require_once "includes/functions.php";
    define("PAGE", "addtask");
    if(!logged_in()){
    header("Location: login");
    exit();
    }

    if (isset($_GET['brandID'])) {
        $brandID = Sanitizer::sanitizeInput($_GET['brandID']);
    }

    $brand = new Brand($kon, $brandID);

    if (isset($_POST['submit'])) {
        $brand = Sanitizer::sanitizeInput($_POST['pname']);
        $image = $_FILES['pimage'];
        $brandID = Helper::randomString(10);
        $date = date("F j, Y");

        $image = $_FILES['pimage'];
        $target_dir = "./assets/img/brand/";
        $imageFileType = strtolower(pathinfo($image['name'],PATHINFO_EXTENSION));
        $imgName = $brandID.'.'.$imageFileType;
        $target_file = $target_dir . $imgName;


        if(strlen($brand) < 3){
            $error = "Enter a valid brand name";
        }else{
            if(empty($image['name']) && empty($image['tmp_name'])){
                $query = $kon->prepare("INSERT INTO brand (name, brand_id, date_added) VALUES (:name, :id, :dt)");
                $query->bindParam(":name", $brand);
                $query->bindParam(":id", $brandID);
                $query->bindParam(":dt", $date);
                $done = $query->execute();
                if($done){
                    Helper::redirect("editBrand?brandID=$brandID");
                }
            }else{
                if(uploadImage($image, $imageFileType)){
                    if(move_uploaded_file($image["tmp_name"], $target_file)) {
                        $query = $kon->prepare("INSERT INTO brand (name, brand_id, logo, date_added) VALUES (:name, :id, :logo, :dt)");
                        $query->bindParam(":name", $brand);
                        $query->bindParam(":id", $brandID);
                        $query->bindParam(":logo", $imgName);
                        $query->bindParam(":dt", $date);
                        $done = $query->execute();
                        if($done){
                            Helper::redirect("editBrand?brandID=$brandID");
                        }
                    }
                }
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
                        <h1 class="dashboard__main__content__pagetitle">
                   <img src="./assets/img/brand/<?= $brand->logo() ?>" alt="<?= $brand->name() ?>" width="40"> <?= $brand->name() ?></h1> 
                        <p class="dashboard__main__content__pagecaption light-text">
                            
                        </p>
                    </div>
                    <div class="settings__main__content__body">
                        <div class="Add-product bg-white p-4">
                            <h5>Page Follow/Subscription tasks</h5>
                            <div style="padding: 10px 0; color: red; text-align: center;"><?= @$error ?></div>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <!-- <label for="pname" class="form-label">Facebook</label> -->
                                    <input type="text" class="form-control" name="facebook" placeholder="Facebook Link">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="instagram" placeholder="Instagram Link">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="twitter" placeholder="Twitter Link">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="youtube" placeholder="YouTube Link">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="linkedin" placeholder="Linkedin Link">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="tiktok" placeholder="TikTok Link">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="audiomack" placeholder="Audiomack Link">
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
                            <div style="padding: 10px 0; color: red; text-align: center;"><?= @$error ?></div>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <!-- <label for="pname" class="form-label">Facebook</label> -->
                                    <input type="text" class="form-control" name="facebook" placeholder="Facebook Link">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="instagram" placeholder="Instagram Link">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="twitter" placeholder="Twitter Link">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="youtube" placeholder="YouTube Link">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="linkedin" placeholder="Linkedin Link">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="tiktok" placeholder="TikTok Link">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="audiomack" placeholder="Audiomack Link">
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
                            <div style="padding: 10px 0; color: red; text-align: center;"><?= @$error ?></div>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <!-- <label for="pname" class="form-label">Facebook</label> -->
                                    <input type="text" class="form-control" name="playstore" placeholder="Google Playstore Link">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="appstore" placeholder="Apple Store Link">
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
                            <div style="padding: 10px 0; color: red; text-align: center;"><?= @$error ?></div>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="telegram" placeholder="Telegram Group Link">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="whatsapp" placeholder="Whatsapp Group Link">
                                </div>
                                  <div class="mb-3">
                                    <button type="submit" name="group" class="btn btn-secondary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <br> <br>
                    <div class="settings__main__content__body">
                        <div class="Add-product bg-white p-4">
                            <h5>Posting Task</h5>
                            <div style="padding: 10px 0; color: red; text-align: center;"><?= @$error ?></div>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <!-- <label for="pname" class="form-label">Facebook</label> -->
                                    <!-- <input type="text" class="form-control" name="playstore" placeholder="Google Playstore Link"> -->
                                    <!-- <label for="exampleFormControlTextarea1" class="form-label"></label> -->
                                    <textarea class="form-control" name="posting-link" rows="3" placeholder="Enter link to post"></textarea>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="posting" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <br><br>
                    <div class="brand-action">
                        <a href="#" class="btn btn-danger">Delete this Brand</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets/js/main.js"></script>
</body>
</html>