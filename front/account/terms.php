<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
    <title>Team Booster | Terms and Conditions</title>
</head>
<body class="main-body">
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

    <section class="about">
        <div class="container">
            <div class="about-wrap reverse">
                <div class="about-div about-text">
                    <h4 class="" style="color: #2d9bfc;">Terms and Condition</h4>
                    <p>You must have at least 500 followers on your social media accounts.</p>
                    <p>You must screen shot your task after carry out the task and upload the pictures on the site.</p>
                    <p>After performing your task duties by following a page, like, subscribe, comment, join group, download app etc and you went back to undo the task which you have done you we be disqualified.</p>
                    <p>We have set up a team to watch over disclaimers, and those that we not comply with the terms and conditions of this site will be disqualified.</p>
                </div>
                <div class="about-div" style="display: flex; justify-content: start;">
                    <img src="../assets/img/terms.jpeg" alt="about">
                </div>                
            </div>
        </div>
    </section>
    <div class="py-5"></div>
    <footer><div class="footer"></div></footer>
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
    <script src="../assets/js/main.js"></script>
</body>
</html>