<?php
require_once("includes/init.php");
if(!logged_in()){
    Helper::redirect("../login");
}

if (isset($_GET['brandID'])) {
    $brandID = Sanitizer::sanitizeInput($_GET['brandID']);
}

$posting = new Posting($kon, $brandID);

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
    <title>Team Booster | Posting task</title>
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
                        Airtel Nigeria
                    </div>
                    <div class="card-body">
                        <div class="">
                            <div class="card" style="width: 18rem;">
                                <img src="./assets/img/posting/airtel.jpeg" class="card-img-top" alt="posting">
                                <div class="card-body">
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                              </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-auto">
                              <input type="text" id="copy-url" class="form-control form-control-sm" id="posturl" value="<?= $posting->link() ?>">
                            </div>
                            <div class="col-auto">
                              <button type="submit" id="copy-btn" class="btn btn-sm btn-secondary" onclick="myFunction()">Copy</button>
                            </div>
                            <p><small>Copy the product link and post it on any of your social media handles.</small></p>
                        </div>
                    </div>
                    <div class="p-3">
                        <a href="#" class="btn btn-success">I have completed this task</a>
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
    <script>
        const copyUrl = document.getElementById("copy-url")

        function myFunction() {

        // Select the text field
        copyUrl.select();
        copyUrl.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyUrl.value);


        notifyUser("success", "Copied successfully")
        }
    </script>
</body>
</html>