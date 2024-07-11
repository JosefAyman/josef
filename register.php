<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

</head>

<body>
    <div class="main">

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" action="validate.php" id="signup-form" class="signup-form">



                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" placeholder="Your Name" />
                            <span toggle="#name" style="color: red;" class="zmdi zmdi-eye field-icon toggle-password">
                                <?php
                                if (isset($_SESSION["errors"]["name"])) {

                                    echo ($_SESSION["errors"]["name"]);
                                }
                                ?></span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="email" placeholder="Your Email" />
                            <span toggle="#email" style="color: red;" class="zmdi zmdi-eye field-icon toggle-password">
                                <?php
                                if (isset($_SESSION["errors"]["email"])) {

                                    echo ($_SESSION["errors"]["email"]);
                                }
                                ?></span>
                            <?php
                            if (!empty($_GET["msg"]) && $_GET["msg"] == "This email Already Register") {
                            ?>
                                <div class="alert alert-warning" role="alert">
                                    <strong style=" color: darkred; ">This email Already Register</strong>
                                </div>

                            <?php
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="phone" placeholder="Your Phone" />
                            <span toggle="#phone" style="color: red;" class="zmdi zmdi-eye field-icon toggle-password">
                                <?php
                                if (isset($_SESSION["errors"]["email"])) {

                                    echo ($_SESSION["errors"]["email"]);
                                }
                                ?></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" placeholder="Password" />
                            <span toggle="#password" style="color: red;" class="zmdi zmdi-eye field-icon toggle-password">
                                <?php
                                if (isset($_SESSION["errors"]["password"])) {

                                    echo ($_SESSION["errors"]["password"]);
                                }
                                ?></span>

                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" placeholder="Repeat your password" />
                            <span toggle="#re_password" style="color: red;" class="zmdi zmdi-eye field-icon toggle-password">
                                <?php
                                if (isset($_SESSION["errors"]["re_password"])) {

                                    echo ($_SESSION["errors"]["re_password"]);
                                }
                                ?></span>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-submit">
                                Submit
                            </button>
                        </div>


                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="login.php" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
<?php
$_SESSION["errors"] = null;
?>