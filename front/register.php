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
    <title>Team Booster | Register</title>
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
            <h4>Create an account</h4>
            <small class=""><i>Complete the form below</i></small><br><br>
            <form id="regform" autocomplete="on">
                <div class="mb-2">
                  <label for="names" class="form-label">Full Names</label>
                  <input type="text" class="form-control form-control-sm" id="names" name="fname" required>
                </div>
                <div class="mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control form-control-sm" id="email" name="email" required>
                  </div>                
                <div class="mb-2">
                  <label for="phone" class="form-label">Phone</label>
                  <input type="number" class="form-control form-control-sm" id="phone" name="phone" min="1" required>
                </div>
                <div class="mb-2">
                  <label for="jobpass" class="form-label">Job pass</label>
                  <input type="text" class="form-control form-control-sm" id="jobpass" name="jobpass" required>
                  <small><i class="text-primary buy-jobpass" style="cursor: pointer;">Click here to buy a job pass code.</i></small>
                </div>
                <div class="mb-2">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control form-control-sm" id="password" name="password" required>
                </div>
                <div class="mb-2">
                    <label for="cpassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control form-control-sm" id="cpassword" name="cpassword" required>
                </div>
                <div class="mb-2">
                  <label class="form-label">Schedule</label>
                    <div style="display:flex; gap: 20px;">
                        <span>
                            <label for="ftime" class="form-label">Full Time</label>
                            <input type="radio" value="full_time" id="ftime" name="schedule" checked>
                        </span>
                        <span>
                            <label for="ptime" class="form-label">Part Time</label>
                            <input type="radio" value="part_time" id="ptime" name="schedule">
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                <div class="py-3">
                    <small>Click here to <a class="text-primary" href="./login">Login</a></small>
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
        </div>
    </div>
    <div class="menu-bg d-none"></div>

    <div class="my-modal d-none">
        <button class="btn close-my-modal"><i class="fa-solid fa-times"></i></button>
        <div class="my-modal-items">
            <div class="choose-agent">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title pb-3"><h5>Approved Team Booster Agents</h5></div>

                        <a href="#" class="">
                        <div class="c-agent alert alert-primary" role="alert">
                            MEGAMIKE
                        </div>
                        </a>

                        <a href="#" class="">
                        <div class="c-agent alert alert-warning" role="alert">
                            CEE J
                        </div>
                        </a>

                        <a href="#" class="">
                        <div class="c-agent alert alert-danger" role="alert">
                            WILLAMS
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-modal-bg  d-none"></div>

    <!-- alert -->
    <div class="notify"></div>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script>

    // my modal
    const jobPass = document.querySelector(".buy-jobpass")
    const myModal = document.querySelector(".my-modal")
    const myModalBg = document.querySelector(".my-modal-bg")
    const closeMyModalBtn = document.querySelector(".close-my-modal")

    jobPass.onclick = ()=>{
        openMyModal()
    }
    closeMyModalBtn.onclick = ()=>{
        closeMyModal()
    }
    myModalBg.onclick = ()=>{
        closeMyModal()
    }


    function openMyModal(){
        myModal.classList.remove("d-none")
        myModal.classList.add("puff-in-center")
        myModalBg.classList.remove("d-none")
    }
    function closeMyModal(){
        myModal.classList.add("d-none")
        myModal.classList.remove("puff-in-center")
        myModalBg.classList.add("d-none")
    }


        const regForm = document.getElementById("regform")
        const regForm = document.getElementById("regform")
        regForm.onsubmit = (e)=>{
            e.preventDefault()
            showLoader()
            ajax = new XMLHttpRequest()
            ajax.onload = ()=>{
                if(ajax.readyState == 4 && ajax.status == 200){
                    if(parseInt(ajax.responseText)==1){
                        hideLoader()
                        notifyUser("success", "Successful");
                        window.location = 'success'
                    }else{
                        hideLoader()
                        notifyUser("danger", ajax.responseText);
                    }
                }
            }
            ajax.open("POST", "process.php", true)
            const formData = new FormData(regForm);
            console.log(formData)
            ajax.send(formData)
        }
    </script>   
</body>
</html>