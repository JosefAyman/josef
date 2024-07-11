<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link rel="stylesheet" href="styles/reset_password.css">
</head>

<body>
    <div class="container">
        <h2>Password Reset</h2>
        <form action="/reset_password" method="post">
            <input type="password" name="password" placeholder="New Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm New Password" required>
            <input type="submit" value="Reset Password">
        </form>
    </div>
</body>

</html>



</html>


