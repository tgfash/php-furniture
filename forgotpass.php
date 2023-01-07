<?php include 'connection.php'?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>
    <div class="text-center" style="padding:50px 0">
        <div class="logo">Forgot password</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="forgot-password-form" class="text-left" method="post" autocomplete="off">
                <div class="etc-login-form">
                    <p>When you fill in your email address, you will be sent instructions on how to reset your password.
                    </p>
                </div>
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="fp_email" class="sr-only">Email address</label>
                            <input type="text" class="form-control" id="fp_email" name="fp_email"
                                placeholder="email address">
                        </div>
                    </div>

                    <?php
              if(isset($_POST['forgot'])){
                $email = $_POST['fp_email'];
                $result = mysqli_query($connect,"SELECT Username from account where Email = '".$email."'");
                if(mysqli_num_rows($result) ==0){
                    echo '</br>';
                    echo '<p><i class="fa fa-exclamation-triangle" style="color:red;"></i> Could not find your email</p>';
                }else{
                while ($row = mysqli_fetch_array($result)){
                    if($row){
                $url="http://localhost/Mango/create-newpass.php";
                  $to = $email;
                  $subject = 'Reset your password for localhost';

                  $message ='<p>Hi '.$row[0].'</br>';
                  $message .= '<p>We received a password reset request.The link to reset your password is below . If you did not make this request ,you can ignore this email</p>';
                  $message .='<p>Here is your password reset link:</br>';
                  $message .='<a href="'.$url.'">'.$url.'</a></p>';

                  $headers = "From: mangocompany <mango@gmail.com>\r\n";
                  $headers .="Reply-To:mango@gmail.com\r\n";
                  $headers .="Content-type:text/html\r\n";

                  mail($to,$subject,$message,$headers);
                  $_SESSION["UF"] = $row[0];
                  echo '</br>';
                  echo '<p><i class="fa fa-check"></i> Check your email</p>';
                
                }
                   
            }
        }
              
              }
              ?>
                    <button type="submit" name="forgot" class="login-button"><i
                            class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <p>Already have an account? <a href="login.php">Login here</a></p>
                    <p>New user? <a href="register.php">Create new account</a></p>
                </div>
            </form>
        </div>
        <!-- end:Main Form -->
    </div>
</body>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Additional Scripts -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/owl.js"></script>

</html>