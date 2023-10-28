<?php
    require_once "includes/init.php";
    require_once "includes/functions.php";
    define("PAGE", "addtask");
    if(!logged_in()){
    header("Location: login");
    exit();
    }

    function insertPosting($brandID){
        global $kon;
        $post = $kon->prepare("INSERT INTO posting (brand_id) VALUES ('$brandID')");
        $post->execute();
    }

    function insertOthers($brandID){
        global $kon;

        $downloads = $kon->prepare("INSERT INTO downloads (brand_id) VALUES ('$brandID')");
        $downloads->execute();

        $groups = $kon->prepare("INSERT INTO groups (brand_id) VALUES ('$brandID')");
        $groups->execute();

        $follows = $kon->prepare("INSERT INTO follows (brand_id) VALUES ('$brandID')");
        $follows->execute();

        $likes = $kon->prepare("INSERT INTO likes (brand_id) VALUES ('$brandID')");
        $likes->execute();
    }

    if (isset($_POST['submit'])) {
        $brand = Sanitizer::sanitizeInput($_POST['pname']);
        $image = $_FILES['pimage'];
        $brandID = Helper::randomString(10);
        $type = Sanitizer::sanitizeInput($_POST['type']);
        $schedule = Sanitizer::sanitizeInput($_POST['schedule']);
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
                $query = $kon->prepare("INSERT INTO brand (name, brand_id, brand_type, schedule, date_added) VALUES (:name, :id, :type, :sch, :dt)");
                $query->bindParam(":name", $brand);
                $query->bindParam(":id", $brandID);
                $query->bindParam(":type", $type);
                $query->bindParam(":sch", $schedule);
                $query->bindParam(":dt", $date);
                $done = $query->execute();
                if($done){
                    if($type == "posting"){insertPosting($brandID);}else{insertOthers($brandID);}
                    Helper::redirect("$type?brandID=$brandID");
                }
            }else{
                if(uploadImage($image, $imageFileType)){
                    if(move_uploaded_file($image["tmp_name"], $target_file)) {
                        $query = $kon->prepare("INSERT INTO brand (name, brand_id, logo, brand_type, schedule, date_added) VALUES (:name, :id, :logo, :type, :sch, :dt)");
                        $query->bindParam(":name", $brand);
                        $query->bindParam(":id", $brandID);
                        $query->bindParam(":logo", $imgName);
                        $query->bindParam(":type", $type);
                        $query->bindParam(":sch", $schedule);
                        $query->bindParam(":dt", $date);
                        $done = $query->execute();
                        if($done){
                            if($type == "posting"){insertPosting($brandID);}else{insertOthers($brandID);}
                            Helper::redirect("$type?brandID=$brandID");
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
                        <h1 class="dashboard__main__content__pagetitle">Add Brand</h1> 
                        <p class="dashboard__main__content__pagecaption light-text">
                            
                        </p>
                    </div>
                    <div class="settings__main__content__body">
                        <div class="Add-product bg-white p-4">
                            <div style="padding: 10px 0; color: red; text-align: center;"><?= @$error ?></div>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="pname" class="form-label">Brand name</label>
                                    <input type="text" class="form-control" name="pname" placeholder="Brand name">
                                </div>
                                <div class="mb-3">
                                    <label for="pimage" class="form-label">Brand Image</label>
                                    <input class="form-control" type="file" name="pimage">
                                </div>
                                <div class="mb-3">
                                    <label for="schedule" class="form-label">Workers</label>
                                    <select name="schedule" class="form-control" id="schedule">
                                        <option value="full_time">Full Time</option>
                                        <option value="part_time">Part Time</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <div style="display:flex; gap: 20px;">
                                        <span>
                                            <label for="others" class="form-label">Others</label>
                                            <input type="radio" value="others" id="others" name="type" checked>
                                        </span>
                                        <span>
                                            <label for="post" class="form-label">Posting</label>
                                            <input type="radio" value="posting" id="post" name="type">
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets/js/main.js"></script>
</body>
</html>