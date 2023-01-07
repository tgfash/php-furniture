<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/toast/toastr.css">
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/toast/toastr.min.js"></script>
</head>

<body>
    <section class="vh-100 bg-image" style="background-image: url('./register/background.jpg');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                                <form action="" method="post">

                                    <div class="form-outline mb-4">
                                        <label class="form-label">Your Name</label>
                                        <input type="text" name="name" required class="form-control form-control-lg" />

                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label">Your Username</label>
                                        <input type="text" name="username" required
                                            class="form-control form-control-lg" />

                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" required
                                            class="form-control form-control-lg" />
                                        <div id="errorMail" style="display: none; color: red; ">
                                            <i class="fa fa-exclamation-triangle"></i>
                                            <span>Email has existed</span>
                                        </div>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="pass1" required
                                            class="form-control form-control-lg" />

                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label">Repeat your password</label>
                                        <input type="password" name="pass2" required
                                            class="form-control form-control-lg" />
                                        <div id="error" style="display: none; color: red; ">
                                            <i class="fa fa-exclamation-triangle"></i>
                                            <span>Password does not match</span>
                                        </div>
                                    </div>

                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" type="checkbox" value=""
                                            id="form2Example3cg" style="margin-left: -70%; margin-top:1.5%;" />
                                        <label class="form-check-label" for="form2Example3g">
                                            I agree all statements in <a href="terms.php" class="text-body"><u>Terms of
                                                    service</u></a>
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="register"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                    </div>
                                    <?php include 'connection.php' ?>
                                    <?php

                                    if (isset($_POST["register"])) {
                                        $name = $_POST["name"];
                                        $username = $_POST["username"];
                                        $email = $_POST["email"];
                                        $pass1 = $_POST["pass1"];
                                        $pass2 = $_POST["pass2"];
                                                        
                                        if ($pass1 != $pass2)  {
                                            echo "<script>document.getElementById('error').style.display='block';</script>";
                                        }else{
                                            $result = mysqli_query($connect,"SELECT Email from account WHERE Email = '".$email."'");                                 
                                            if(mysqli_num_rows($result) != 0){
                                                echo "<script>document.getElementById('errorMail').style.display='block';</script>";
    
                                            }else{
                                                mysqli_query($connect, "
                                                INSERT INTO account (Username,Account_Name,Password,Email,isAdmin) values ('$name','$username','$pass1','$email',0)
                                                ");

                                            mysqli_query($connect, "
                                                INSERT INTO customer(Account_Id,Customer_Name,Username)
                                                SELECT Account_Id,Username,Account_Name from account where isAdmin = 0 and Username = '$name'");
                                            echo "<script>window.location.href='login.php';</script>";
                                            $_SESSION['Register'] = "Login succesfully";
                                               
                                            }
                                        }
                                        
                                       
                                    ?>
                                    <?php
                                        }
                                     ?>
                                    <p class="text-center text-muted mt-5 mb-0">Have already an account? <a
                                            class="btn btn-primary" href="login.php" class="fw-bold text-body">Login
                                            Here</a>
                                    </p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>