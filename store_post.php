<?php
session_start();
if (!empty($_REQUEST["content"])) {
    require_once("classes.php");
$user = unserialize($_SESSION["user"]);

if ($_FILES ["image"]["name"]) {
    $imageStore = "image/posts/" . $_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"],$imageStore);
}else{
    $imageStore = null ;
}

$user->store_post($_REQUEST["title"],$_REQUEST["content"],$imageStore,$user->id);
header("location:profile.php?msg=done");
    
}else{
    header("location:profile.php?msg=content is required");
}