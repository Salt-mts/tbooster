<?php
require_once "includes/init.php";
if(logged_in()){
    header("Location: index");
    exit();
}
if (isset($_POST['login'])) {
    $pass = $_POST['pass'];

    if($pass === "password"){
        $_SESSION['irsLOgin'] = "$uname";
        header("Location: index");
    }else{
        $error = "Invalid credentials";
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
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
    <title>Team Booster | Login</title>
</head>
<body>
    <section id="login">
        <div class="login-wrap">
            <div class="login-form">
                <div class="login-logo">
                    <img src="./assets/img/logo-light.png" width="200">
                </div>
                <div><i class="fas fa-lock"></i><span class="text">Welcome</span>  </div>
                <small class="">Log in securely into your account</small>
                <form action="" method="POST">
                    
                    <p style="color: red; padding: 10px 0;"><?= @$error ?></p>

                <div class="login__form__div">
                    <label for="password">Password</label>
                    <input type="password" name="pass" id="password" class="login__form__input" >
                </div>
                <div class="mt-3">
                    <button type="submit" name="login" class="primary-btn w-100">Sign in</button>
                </div>
                </form>
            </div>
            <div class="login-copy">
                <p>&copy; <span class="copyright-year"></span> Abia IRS | All Rights Reserved</p>
                
            </div>
        </div>
    </section>
    <script src="./assets/js/main.js"></script>
    <script>
        const copyYear = document.querySelector(".copyright-year")
        let date = new Date()
        const year = date.getFullYear()
        copyYear.textContent = year
    </script>
</body>
</html>