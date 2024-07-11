<?php
// var_dump($_FILES);
session_start();
require_once("classes.php");
$user = unserialize( $_SESSION["user"]);
if (!empty($_FILES["image"]["name"])) {

    $profileImage = "image/users/" . $_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"],$profileImage);
    $user->profile_image($profileImage,$user->id);
    $user->image=$profileImage;
    $_SESSION["user"] = serialize($user);
    
    header("location:profile.php?msg=success");

}else{
    header("location:profile.php?msg=nophoto");
}