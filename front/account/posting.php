<?php
require_once("includes/init.php");
if(!logged_in()){
    Helper::redirect("../login");
}

if (isset($_GET['brandID'])) {
    $brandID = Sanitizer::sanitizeInput($_GET['brandID']);
}

$posting = new Posting($kon, $brandID);
$completed = new Completed($kon, $brandID, $uid);
$brand = new Brand($kon, $brandID);
$brandType = $brand->type();
$price = $posting->price();

if(isset($_GET['comp'])){
    $added = $completed->add($brandType, $price);
    if($added){
        Helper::redirect("completed");
    }
}

if($completed->isCompleted()){
    Helper::redirect("completed");
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
    <title>Team Booster | Posting task</title>
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
                    <h5><?= $brand->name() ?> - &#8358;<?= number_format($posting->price(),2) ?><h5>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <div class="card" style="width: 18rem;">
                                <img src="<?= Helper::admin_url() ?>assets/img/posting/<?= $posting->image() ?>" class="card-img-top" alt="posting">
                                <div class="card-body">
                                  <p class="card-text"><?= $posting->desc() ?></p>
                                </div>
                              </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-auto">
                              <input type="text" id="copy-url" class="form-control form-control-sm" id="posturl" value="<?= $posting->link() ?>">
                            </div>
                            <div class="col-auto">
                              <button type="submit" id="copy-btn" class="btn btn-sm btn-my" onclick="myFunction()">Copy</button>
                            </div>
                            <p><small>Copy the product link and post it on any of your social media handles.</small></p>

                            
                        </div>
                    </div>
                    <div class="p-3">
                        <button class="btn btn-sm btn-my " id="task-comp">I have completed this task</button>

                        
                        <form id="compForm" class="d-none alert alert-warning">
                        <div class="card-title pb-3"><h6>Upload a screenshot of the completed task</h6></div>
                            <input type="file" class="form-control" name="proof" required>
                            <input type="hidden" name="type" value="<?= $brandType ?>" required>
                            <input type="hidden" name="price" value="<?= $price ?>" required>
                            <input type="hidden" name="bid" value="<?= $brandID ?>" required>
                            <br>
                            <button class="btn-sm btn btn-my text-light">Send</button>
                        </form>
                    </div>
                  </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer">
          <p>  &copy; <span class="fyear"></span> Team Booster</p>
        </div>
        <!-- // set jobpass to avoid JS error -->
        <div class="buy-jobpass"></div>
    </footer>
    <div class="menu d-none">
        <button class="btn close-menu"><i class="fa-solid fa-times"></i></button>
        <div class="menu-items">            
            <?php require_once("includes/components/menu.php"); ?>
        </div>
    </div>
    <div class="menu-bg d-none"></div>

    <!-- my mmodal -->
    <div class="my-modal d-none">
        <button class="btn close-my-modal"><i class="fa-solid fa-times"></i></button>
        <div class="my-modal-items">
            <div class="choose-agent">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title pb-3"><h5>Accelerate Ads</h5></div>

                        <a href="https://web.facebook.com/" target="_blank" class="post-final">
                        <div class="c-agent d-flex gap-3 align-items-center alert alert-primary" role="alert">
                            <img src="./assets/img/icons/facebook.png" alt="facebook" width="40">
                            Facebook
                        </div>
                        </a>

                        <a href="https://twitter.com/" target="_blank" class="post-final">
                        <div class="c-agent d-flex gap-3 align-items-center alert alert-primary" role="alert">
                            <img src="./assets/img/icons/twitter.png" alt="twitter" width="40">
                            Twitter
                        </div>
                        </a>

                        <a href="https://instagram.com/" target="_blank" class="post-final">
                        <div class="c-agent d-flex gap-3 align-items-center alert alert-primary" role="alert">
                            <img src="./assets/img/icons/instagram.png" alt="instagram" width="40">
                            Instagram
                        </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-modal-bg d-none"></div>

    <!-- alert -->
    <div class="notify"></div>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/main.js"></script> 
    <script src="./assets/js/content.js"></script> 
    <script>
        const copyUrl = document.getElementById("copy-url")

        function myFunction() {

        // Select the text field
        copyUrl.select();
        copyUrl.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyUrl.value);


        notifyUser("success", "Copied successfully")
        openMyModal()
        }
        

        const completedBtn = document.getElementById("task-comp")
        completedBtn.onclick=()=>{
            completedBtn.classList.add("d-none")
            compForm.classList.remove("d-none")
        }

        const compForm = document.getElementById("compForm")
        compForm.onsubmit = (e)=>{
            e.preventDefault()
            showLoader()
            ajax = new XMLHttpRequest()
            ajax.onload = ()=>{
                if(ajax.readyState == 4 && ajax.status == 200){
                    if(parseInt(ajax.responseText)==1){
                        hideLoader()
                        notifyUser("success", "Successful");
                        location.reload()
                        window.location = compForm.schedule.value
                    }else{
                        hideLoader()
                        notifyUser("danger", ajax.responseText);
                    }
                }
            }
            ajax.open("POST", "process.php", true)
            const formData = new FormData(compForm);
            ajax.send(formData)
        }
        
        // function addCredit(){

        //     const bid = document.getElementById("brand-id")
        //     const bpr = document.getElementById("brand-price")
        //     const typ = document.getElementById("brand-type")
            
        //     ajax = new XMLHttpRequest()
        //     ajax.onload = ()=>{
        //         if(ajax.readyState == 4 && ajax.status == 200){
        //             if(parseInt(ajax.responseText)==1){
        //                 notifyUser("success", "Successful");
        //                 agentForm.reset()
        //             }else{
        //                 notifyUser("danger", ajax.responseText);
        //             }
        //         }
        //     }
        //     ajax.open("POST", "process.php", true)
        //     ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //     ajax.send(`price=${bpr.value}&bid=${bid.value}&type=${typ.value}`)
        // }

    </script>
</body>
</html>