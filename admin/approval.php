<?php 
require_once "includes/init.php";
define("PAGE", "approval");
if(!logged_in()){
    header("Location: login");
    exit();
}
$query = $kon->prepare("SELECT * FROM completed WHERE is_paid = 0 ORDER BY id DESC");
$query->execute();
$rows = $query->fetchAll(PDO::FETCH_ASSOC);
$n = 1;

if(isset($_GET['approveit'])){
    $id = $_GET['approveit'];
    $query = $kon->prepare("UPDATE completed SET status = 1 WHERE id = '$id' ");
    $done = $query->execute();
    if($done){
        Helper::redirect("approval");
    }
}

if(isset($_GET['markpaid'])){
    $id = $_GET['markpaid'];
    $query = $kon->prepare("UPDATE completed SET is_paid = 1 WHERE id = '$id' ");
    $done = $query->execute();
    if($done){
        Helper::redirect("approval");
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
    <link href="./assets/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <title>Pending Approval | Admin</title>
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
                        <h1 class="dashboard__main__content__pagetitle">Pending Approval</h1> 
                        <p class="dashboard__main__content__pagecaption light-text">
                            
                        </p>
                    </div>
                    <div class="settings__main__content__body">
                        <div class="dataset-data table-responsive">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>User</th>
                                        <th>Brand</th>
                                        <th>Price</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Payment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach ($rows as $row) { 
                                        $brand = new Brand($kon, $row['brand_id'])
                                    ?>   
                                    <tr>
                                        <td><?= $n++ ?></td>
                                        <td><?= $row['user_id'] ?></td>
                                        <td><?= $brand->name() ?></td>
                                        <td><?= number_format($row['price'],2) ?></td>  
                                        <td><?= $row['brand_type'] ?></td>
                                        <td><?= $row['status'] == 1?'Approved':'Pending Approval' ?></td>  
                                        <td><?= $row['is_paid'] == 1?'Paid':'Not Paid' ?></td>      
                                        <td>
                                        <?php if($row['status']){ ?>
                                            <a onclick="return confirm('Are you sure you have paid this user?')" class="primary-btn-sm" href="approval?markpaid=<?= $row['id'] ?>">Paid</a>
                                        <?php }else{ ?>
                                            <a onclick="return confirm('Are you sure this user have completed the task?')" class="primary-btn-sm" href="approval?approveit=<?= $row['id'] ?>">Approve</a>
                                        <?php } ?>

                                        </td>
                                    </tr> 
                                    <?php } ?>                                   
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>S/N</th>
                                        <th>User</th>
                                        <th>Brand</th>
                                        <th>Price</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Payment</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/jquery.dataTables.min.js"></script>
    <script src="./assets/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $('#example').DataTable();
    </script>
    <script src="./assets/js/main.js"></script>
</body>
</html>