<?php
require_once("account/includes/init.php");
if(logged_in()){
    Helper::redirect("./account/dashboard");
}

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
    <title>Team Booster | Login</title>
</head>
<body class="main-body">
    <div class="loader-wrap d-none">
        <span class="loader"></span>
    </div>
    <header>
        <div class="header">
            <div class="logo"><img src="./assets/img/logo.png" alt="logo" width="150"></div>
            <div class="hamburger">
                <button class="btn menu-btn">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </header>
    <section class="main-content">
        <div class="form">
            <h4>Login</h4>
            <br>
            <form id="login-form">
                <div class="mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control form-control-sm" id="email" name="loginEmail" required>
                  </div>              
                <div class="mb-2">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control form-control-sm" id="password" name="loginPass" required>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Login</button>

                <br>
                <div class="d-flex justify-content-between py-3">
                    <small class="text-primary"><a href="./register">Create account</a></small>
                    <small class="forgot text-primary"><a href="#">Forgot password?</a></small>
                </div>
              </form>
        </div>
    </section>
    <footer><div class="footer"></div></footer>
    <div class="menu d-none">
        <button class="btn close-menu"><i class="fa-solid fa-times"></i></button>
        <div class="menu-items">
            <a href="./"><p>Home</p></a>
            <a href="./login"><p>Login</p></a>
            <a href="./register"><p>Register</p></a>
            <a href="./terms"><p>Terms and Conditions</p></a>
        </div>
    </div>
    <div class="menu-bg d-none"></div>

    <!-- alert -->
    <div class="notify"></div>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script>
        const loginForm = document.getElementById("login-form")
        loginForm.onsubmit = (e)=>{
            e.preventDefault()
            showLoader()
            ajax = new XMLHttpRequest()
            ajax.onload = ()=>{
                if(ajax.readyState == 4 && ajax.status == 200){
                    if(parseInt(ajax.responseText)==1){
                        hideLoader()
                        notifyUser("success", "Successful");
                        loginForm.reset()
                        window.location = 'account/dashboard'
                    }else{
                        hideLoader()
                        notifyUser("danger", ajax.responseText);
                    }
                }
            }
            ajax.open("POST", "process.php", true)
            const formData = new FormData(loginForm);
            console.log(formData)
            ajax.send(formData)
        }
    </script>
</body>
</html>