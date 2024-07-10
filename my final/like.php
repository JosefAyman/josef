<?php
session_start();
require_once("classes.php");

// تحقق من أن المستخدم مسجل الدخول
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

$user = unserialize($_SESSION["user"]);

// تحقق من صحة معرفات المنشور والمستخدم
if (isset($_POST['post_id']) && isset($_POST['user_id'])) {
    $post_id = intval($_POST['post_id']);
    $user_id = intval($_POST['user_id']);

    // استدعاء دالة الإعجاب
    $user->likes($post_id, $user_id);
} else {
    echo "Invalid post_id or user_id.";
}
?>
