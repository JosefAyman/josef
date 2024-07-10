<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $errors = [];

    if (empty($email) || empty($password)) {
        $errors[] = "emptyfield";
    } else {
        // افتراضياً التحقق من المستخدم وكلمة المرور، يمكنك تعديل هذا الجزء
        $user = getUserByEmail($email); // هذه الدالة يجب أن تعود بمعلومات المستخدم من قاعدة البيانات
        if (!$user) {
            $errors[] = "nouser";
        } elseif (!password_verify($password, $user["password"])) { // تأكد من استخدام الهاش للتحقق من كلمة المرور
            $errors[] = "wrongpwd";
        } elseif ($user["status"] == "banned") {
            $errors[] = "ban";
        }
    }

    if (!empty($errors)) {
        $_SESSION["errors"] = $errors;
        header("Location: login.php?msg=" . end($errors));
        exit();
    } else {
        // تسجل دخول المستخدم
        $_SESSION["user"] = $user;
        header("Location: dashboard.php");
        exit();
    }
}

function getUserByEmail($email) {
    // منطق للحصول على المستخدم من قاعدة البيانات باستخدام البريد الإلكتروني
    // تأكد من تعديل هذا الجزء ليتوافق مع قاعدة البيانات الخاصة بك
    // مثال افتراضي:
    $users = [
        ["email" => "test@example.com", "password" => password_hash("password", PASSWORD_DEFAULT), "status" => "active"],
        // أضف مستخدمين آخرين هنا
    ];
    
    foreach ($users as $user) {
        if ($user["email"] == $email) {
            return $user;
        }
    }
    
    return null;
}
?>
