<?php
require_once("includes/init.php");
if(!logged_in()){
    Helper::redirect("../login");
}

    $kweri = $kon->prepare("SELECT * FROM brand WHERE brand_type = 'engagement' AND schedule = '$schedule' AND status = 1 ORDER BY id DESC");
    $kweri->execute();
    $rowx = $kweri->fetchAll(PDO::FETCH_ASSOC);

    $query = $kon->prepare("SELECT * FROM brand WHERE brand_type = 'posting' AND schedule = '$schedule' AND status = 1 ORDER BY id DESC");
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);



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
    <title>Team Booster | Dashboard</title>
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
            <div class="user-profile pb-4 text-light">
                <?php require_once("includes/components/widget.php"); ?>
            </div>
            <?php if($schedule == "full_time"): ?>
            <div class="d-flex gap-1 py-3" >
                <a href="dashboard" class="btn-sm btn"  style="background-color: #25D366;">Full Time</a>
                <a href="dashboard_part" class="btn-sm btn btn-outline-secondary">Part Time</a>
            </div>
            <?php endif ?>
            <div class="engage">
                <div class="card">
                    <div class="card-header">
                      <h5>Engagement Task</h5>
                    </div>
                    <div class="card-body" >
                        <p class="">Like and follow business and organisations/top brands pages and earn. Download and preview apps, post comment, subscribe, join groups to earn. The more pages you like and follow/subscribe, the more you earn.</p>


                        <h6 class="pt-3 ">Available tasks</h6>
                        <?php foreach($rowx as $row){  
                            $completed = new Completed($kon, $row['brand_id'], $uid); 
                            if(!$completed->isCompleted()){
                        ?>
                        <a href="tasks?brandID=<?= $row['brand_id'] ?>" class="">
                            <div class="alert" role="alert" style="background-color: #25D366;">                                
                                <div class="product-list">
                                    <img src="<?= Helper::admin_url() ?>assets/img/brand/<?= $row['logo'] ?>" class="product-img" alt="brand" width="40">
                                    <span><?= $row['name'] ?></span>
                                </div>
                            </div>
                        </a>
                        <?php }} ?>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                      <h5>Posting Task</h5>
                    </div>
                    <div class="card-body">
                        <p class="">Earn by posting contents of businesses, organisations and top brands on your timeline.</p>

                        <h6 class="pt-3">Available tasks</h6>

                        <?php foreach ($rows as $row) { 
                            $brand = new Brand($kon, $row['brand_id']); 
                            $completed = new Completed($kon, $row['brand_id'], $uid); 
                            if(!$completed->isCompleted()){
                            ?>
                            <a href="posting?brandID=<?= $row['brand_id'] ?>" class="">
                                <div class="alert" role="alert"  style="background-color: #25D366;">
                                    <div class="product-list">
                                        <img src="<?= Helper::admin_url() ?>assets/img/brand/<?= $brand->logo() ?>" class="product-img" alt="posting" width="40">
                                        <span><?= $brand->name() ?><span>
                                    </div>                                
                                </div>
                            </a>                            
                        <?php }} ?>
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

    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/main.js"></script>
   
</body>
</html>