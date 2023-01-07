<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./login/css/util.css">
    <link rel="stylesheet" type="text/css" href="./login/css/main.css">
    <link rel="stylesheet" href="vendor/toast/toastr.css">
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/toast/toastr.min.js"></script>
</head>

<body>
    <div class=" limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="" method="post">
                    <span class="login100-form-title p-b-43">
                        Login to continue
                    </span>


                    <div class="wrap-input100 validate-input" data-validate="">
                        <input class="input100" type="text" name="account_name" required>
                        <span class="focus-input100"></span>
                        <span class="label-input100">Username</span>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="pass" required>
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>
                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div id="error" style="float:right;display: none; color: red; ">
                            <i class="fa fa-exclamation-triangle"></i>
                            <span>Username or password is incorrect</span>
                        </div>
                    </div>
                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div style="float:right ;">
                            <a href="forgotpass.php" class="txt1">
                                Forgot Password?
                            </a>
                        </div>
                    </div>


                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn" name="login">
                            Login
                        </button>
                    </div>
                    <?php include 'connection.php' ?>
                    <?php

                    if (isset($_POST["login"])) {
                        $tk = $_POST["account_name"];
                        $mk = $_POST["pass"];
                        $rows = mysqli_query($connect, "
                    select * from account where Account_Name = '$tk' and Password = '$mk' and isAdmin = 0");
                        $count = mysqli_num_rows($rows);

                        if ($count == 1) {
                            $_SESSION["username"] = $tk;
                            if (isset($_SESSION["username"])) {
                                echo "<script>window.location.href='index.php';</script>";
                                $_SESSION['Login'] = "Successful";
                            }
                        } else {
                            echo "<script>document.getElementById('error').style.display='block';</script>";
                        }
                    }
                    ?>

                    <div class="text-center p-t-46 p-b-20">
                        <span class="txt2">
                            Register at
                        </span>
                    </div>
                    <div class="login100-form-social flex-c-m">
                        <a href="register.php" class="login100-form-social-item flex-c-m bg1 m-r-5">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </a>
                    </div>

                    <div class="text-center p-t-46 p-b-20">
                        <span class="txt2">
                            or sign up using
                        </span>
                    </div>

                    <div class="login100-form-social flex-c-m">
                        <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>

                        <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                    </div>


                </form>

                <div class="login100-more" style="background-image: url('./assets/images/mangojpg.jpg');">
                </div>

            </div>
        </div>
    </div>
    <?php
    if (isset($_SESSION['Register'])) { ?>
    <script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    toastr["success"]("Register Successfully!", "Success")
    <?php }
        unset($_SESSION['Register']) ?>
    </script>
    <script src="./login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="./login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="./login/vendor/bootstrap/js/popper.js"></script>

    <script src="./login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="./login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="./login/vendor/daterangepicker/moment.min.js"></script>
    <script src="./login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="./login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="./login/js/main.js"></script>
</body>

</html>