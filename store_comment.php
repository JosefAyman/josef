<?php
session_start();
require_once("classes.php");
$user = unserialize($_SESSION["user"]);
if (!empty($_REQUEST["comment"])) {
    $user->store_comment($_REQUEST["comment"],$_REQUEST["post_id"],$user->id);
    header("location:profile.php?msg=send");
}else{
    header("location:profile.php");
}