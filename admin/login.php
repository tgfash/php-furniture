<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/css/util.css">
    <link rel="stylesheet" type="text/css" href="login/css/main.css">
    <link rel="stylesheet" href="../vendor/toast/toastr.css">
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/toast/toastr.min.js"></script>
</head>

<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('../assets/images/adminbg.webp');">
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41">
                    Admin Login
                </span>

                <form class="login100-form validate-form p-b-33 p-t-5" method="post">

                    <div class="wrap-input100 validate-input" data-validate="">
                        <input class="input100" type="text" name="adminacc" placeholder="User name" required>
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="adminpass" placeholder="Password" required>
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>
                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div id="error" style="margin-left: 20px;margin-top: 20px ;display: none; color: red; ">
                            <i class="fa fa-exclamation-triangle"></i>
                            <span>Username or password is incorrect</span>
                        </div>
                    </div>
                    <div class="container-login100-form-btn m-t-32">
                        <button type="submit" class="login100-form-btn" name="log">
                            Login
                        </button>
                    </div>
                    <?php include 'connection.php' ?>
                    <?php
                    if (isset($_POST["log"])) {
                        $tkad = $_POST["adminacc"];
                        $mkad = $_POST["adminpass"];
                        $rows = mysqli_query($connect, "
                    select * from account where Account_Name = '$tkad' and Password = '$mkad' and isAdmin = 1");
                        $count = mysqli_num_rows($rows);

                        if ($count == 1) {
                            $_SESSION["adminun"] = $tkad;
                            if (isset($_SESSION["adminun"])) {
                                echo "<script>window.location.href='index.php?home';</script>";
                                $_SESSION['Login'] = "Successful";
                            }
                        } else {
                            echo "<script>document.getElementById('error').style.display='block';</script>";
                        }
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
    <script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="login/vendor/bootstrap/js/popper.js"></script>
    <script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="login/vendor/daterangepicker/moment.min.js"></script>
    <script src="login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="login/js/main.js"></script>
    <?php
    if (isset($_SESSION['Logout'])) { ?>
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
    toastr["success"]("Logout Successfully!", "Success")


    <?php }
        unset($_SESSION['Logout'])
            ?>
    </script>
</body>

</html>