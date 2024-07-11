<?php
session_start();
$errors = [];
if (empty($_REQUEST["name"])) $errors["name"] = "name is required";
if (empty($_REQUEST["email"])) $errors["email"] = "email is required";
if (empty($_REQUEST["password"])) $errors["password"] = "password is required";
if (empty($_REQUEST["re_password"])) $errors["re_password"] = "password confirm is required";
if ($_REQUEST["password"] != $_REQUEST["re_password"]) $errors ["re_password"]= " password confirm must equal password";

$name = htmlspecialchars(trim($_REQUEST["name"]));
$email = filter_var($_REQUEST["email"],FILTER_SANITIZE_EMAIL);
$phone = htmlspecialchars($_REQUEST["phone"]);
$password = htmlspecialchars($_REQUEST["password"]);
$re_password = htmlspecialchars($_REQUEST["re_password"]);

if (!empty($_REQUEST["email"]) && !filter_var($_REQUEST["email"],FILTER_VALIDATE_EMAIL)) $errors ["email"]= "invalid email";

if (empty($errors)) {
    require_once('classes.php');
    try {
        $rslt =  Subscriber::register($name,$email,$phone,md5($password));
        header("location:login.php?msg=account created successfully");

    } catch (\Throwable $th) {
        header("location:register.php?msg=This email Already Register");

    }
    
    
}else {
    $_SESSION["errors"] = $errors ;
    header("location:register.php");
}

?>