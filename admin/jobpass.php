<?php
    require_once "includes/init.php";
    require_once "includes/functions.php";
    define("PAGE", "pass");
    if(!logged_in()){
    header("Location: login");
    exit();
    }

    $query = $kon->prepare("SELECT * FROM jobpass ORDER BY id DESC");
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    $n = 1;

    if (isset($_POST['submit'])) {
        $owner = Sanitizer::sanitizeInput($_POST['owner']);
        $code = Sanitizer::sanitizeInput($_POST['code']);
        $date = date("F j, Y");

        
        if(empty($owner) || empty($code)){
            $error = "All fields are required";
        }else{
            $query = $kon->prepare("INSERT INTO jobpass (owner, pass, date_added) VALUES (:own, :code, :dt)");
            $query->bindParam(":own", $owner);
            $query->bindParam(":code", $code);
            $query->bindParam(":dt", $date);
            $done = $query->execute();
            if($done){
                Helper::redirect("jobpass");
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
                        <h1 class="dashboard__main__content__pagetitle">Add Job Pass</h1> 
                        <p class="dashboard__main__content__pagecaption light-text">
                            
                        </p>
                    </div>
                    <div class="settings__main__content__body">
                        <div class="Add-product bg-white p-4">
                            <div style="padding: 10px 0; color: red; text-align: center;"><?= @$error ?></div>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="owner" class="form-label">Pass Owner</label>
                                    <select name="owner" id="owner" class="form-control">
                                        <option value="MEGAMIKE">MEGAMIKE</option>
                                        <option value="CCE J">CCE J</option>
                                        <option value="WILLIAMS">WILLIAMS</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="code" class="form-label">Code</label>
                                    <input class="form-control" type="text" id="code" name="code" placeholder="Job pass code">
                                </div>                                
                                <div class="mb-3">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>


                        <br>
                        <div class="dataset-data table-responsive">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Owner</th>
                                        <th>Code</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach ($rows as $row) { ?> 
                                    <tr>
                                        <td><?= $n++ ?></td>
                                        <td><?= $row['owner'] ?></td>
                                        <td><?= $row['pass'] ?></td>
                                        <td><a class="primary-btn-sm" onclick="return confirm('Sure to delete?')" href="jobpass?delpass=<?= $row['id'] ?>">Delete</a></td>
                                    </tr> 
                                    
                                    <?php } ?>                                   
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Owner</th>
                                        <th>Code</th>
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
    <script src="./assets/js/main.js"></script>
</body>
</html>