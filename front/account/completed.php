<?php
require_once("includes/init.php");
if(!logged_in()){
    Helper::redirect("../login");
}

$kweri = $kon->prepare("SELECT * FROM completed WHERE brand_type = 'others' AND user_id = '$uid' ORDER BY id DESC");
$kweri->execute();
$rowx = $kweri->fetchAll(PDO::FETCH_ASSOC);

$query = $kon->prepare("SELECT * FROM completed WHERE brand_type = 'posting' AND user_id = '$uid' ORDER BY id DESC");
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
    <title>Team Booster | Completed task</title>
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
                      Completed Engagement Task
                    </div>
                    <div class="card-body">
                        <?php foreach($rowx as $row){ $brand = new Brand($kon, $row['brand_id'])?>                        
                            <div class="alert alert-secondary" role="alert">                                
                                <div class="product-list">
                                    <img src="<?= Helper::admin_url() ?>assets/img/brand/<?= $brand->logo() ?>" class="product-img" alt="brand" width="40">
                                    <span><?= $brand->name()?> - <?= $row['status']?'':'<i>Pending approval</i>' ?>
                                    <?= $row['status'] && !$row['is_paid'] ?'<i>Awaiting payment</i>':'' ?>
                                    <?= $row['status'] && $row['is_paid'] ?'<i class="text-success">Paid</i>':'' ?></span>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                      Completed Posting Task
                    </div>
                    <div class="card-body">
                        <?php foreach ($rows as $row) { 
                            $brand = new Brand($kon, $row['brand_id']); ?>
                                <div class="alert alert-secondary" role="alert">
                                    <div class="product-list">
                                        <img src="<?= Helper::admin_url() ?>assets/img/brand/<?= $brand->logo() ?>" class="product-img" alt="posting" width="40">
                                        <span><?= $brand->name() ?> - <?= $row['status']?'':'<i>Pending approval</i>' ?>
                                    <?= $row['status'] && !$row['is_paid'] ?'<i>Awaiting payment</i>':'' ?>
                                    <?= $row['status'] && $row['is_paid'] ?'<i class="text-success">Paid</i>':'' ?></span><span>
                                    </div>                                
                                </div>                        
                        <?php } ?>
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