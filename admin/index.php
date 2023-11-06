<?php 
require_once "includes/init.php";
define("PAGE", "home");
if(!logged_in()){
    header("Location: login");
    exit();
}

$query = $kon->prepare("SELECT * FROM brand ORDER BY id DESC LIMIT 5");
$query->execute();
$rows = $query->fetchAll(PDO::FETCH_ASSOC);


// // counters
$kweri = $kon->prepare("SELECT * FROM users");
$kweri->execute();
$countAgent = $kweri->rowCount();

$stmt = $kon->prepare("SELECT * FROM completed WHERE status = 0");
$stmt->execute();
$countIssues= $stmt->rowCount();
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
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
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
                        <h1 class="dashboard__main__content__pagetitle">Home</h1> 
                        <p class="dashboard__main__content__pagecaption light-text">
                            Welcome back,
                            <span class="">Admin</span>.
                        </p>
                    </div>
                    <div class="dashboard__main__content__body">
                        <div class="content__body__left">
                            <div class="balance">
                                <div class="balance-text">Users</div>
                                <div class="balance-amount font-bold">
                                    <div class="the_price"><?= $countAgent ?></div>
                                </div>
                            </div>
                            <div class="balance">
                                <div class="balance-text">Pending Approval</div>
                                <div class="balance-amount font-bold">
                                    <div class="the_price"><?= $countIssues ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="content__body_right">
                            <div class="transaction">
                                <h4>Recent Tasks</h4>
                                <div id="transactions">
                                    <?php  foreach ($rows as $row) { ?>                                    
                                    <div class="trans_row">
                                        <div class="trans_logo">
                                            <img src="./assets/img/brand/<?= $row['logo']  ?>" alt="logo" width="45" style="border-radius: 50%;">
                                        </div>
                                        <div class="trans_details">
                                            <div class="trans_name"><?= $row['name']  ?></div>
                                            <p class="trans_date light-text"><?= $row['date_added'] ?></p>
                                        </div>
                                        <div class="trans_amt success"><?= $row['brand_type']  ?></div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <a class="primary-text trans_link"  href="engage"> All Tasks</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets/js/dashboard.js"></script>
    <script src="./assets/js/main.js"></script>
</body>
</html>