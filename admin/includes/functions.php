<?php

function pre($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}


// upload image
function uploadImage($image, $imageFileType){    
    
    $uploadOk = 1;
    
    $check = getimagesize($image["tmp_name"]);
    if($check == false) {
        echo "File is not an image";
        $uploadOk = 0;
        return false;
    }

    // Check file size
    if ($image["size"] > 5000000) {
    echo "Sorry, your file is too large";
    $uploadOk = 0;
    return false;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
    $uploadOk = 0;
    return false;
    }
    if (!$uploadOk == 0) {    
        return true;
    }else{
        echo "Image cannot be uploaded, choose another image";
        return false;
    }
}

function refBonus(){
    global $kon;
    $query = $kon->prepare("SELECT * FROM settings WHERE id = 1");
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    return $row['referrer'];
}
function countVisit(){
    global $kon;
    if(!isset($_COOKIE['visitcount'])){
        // $_SESSION['visitcount'] = "visitcount";
        setcookie('visitcount', "online");
        $vdate = date("Y-m-d");
        $query = $kon->prepare("INSERT INTO visit_count(vdate) VALUES(:vdate)");
        $query->bindParam(":vdate",$vdate);
        $query->execute();
    }    
}