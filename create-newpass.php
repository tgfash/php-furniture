<?php include 'connection.php' ?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Password</title>
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
        <div class="logo">Create new password</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form class="text-left" method="post" autocomplete="off">
                <?php if(isset($_SESSION["UF"])){
                $unamef = $_SESSION["UF"];
              ?>
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="etc-login-form">
                            <p>Hi <span style="color:blue;  font-weight: bold;"><?php echo $unamef;?> </span>,you can
                                reset your password by
                                form
                                below
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="newpass" class="sr-only">New Password</label>
                            <input type="password" class="form-control" id="newpass" name="newpass"
                                placeholder="new password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirmnewpass" class="sr-only">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirmnewpass" name="confirmnewpass"
                                placeholder="confirm new password" required>
                        </div>
                        <div id="error" style="display: none; color: red; ">
                            <i class="fa fa-exclamation-triangle"></i>
                            <span>Password does not match</span>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="login-button"><i
                            class="fa fa-chevron-right"></i></button>
                </div>
                <?php
                if(isset($_POST["submit"])){
                    $newpass = $_POST['newpass'];
                    $confirmpass = $_POST['confirmnewpass'];
                    if($newpass != $confirmpass){
                        echo "<script>document.getElementById('error').style.display='block';</script>";
                    }else{
                        $execute = mysqli_query($connect,"UPDATE `account` SET `Password`='".$newpass."' WHERE Username = '".$unamef."'");
                        echo "<script>window.location.href='login.php';</script>";
                    }
                }
                }
                ?>
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