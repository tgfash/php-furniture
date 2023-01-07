<?php
ob_start();
session_start();
?>
<?php include 'connection.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Change Password</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">


    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="vendor/toast/toastr.css">
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/toast/toastr.min.js"></script>
</head>

<body>

</body>
<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <h2>Mango Shop <em>Website</em></h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home
                        </a>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">More</a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="about-us.php">About Us</a>
                            <a class="dropdown-item" href="blog.php">Blog</a>
                            <a class="dropdown-item" href="testimonials.php">Testimonials</a>
                            <a class="dropdown-item" href="terms.php">Terms</a>
                        </div>
                    </li>
                    <?php
                    $number = 0;
                    $total = 0;
                    if (isset($_SESSION["cart"])) {
                        $cart = $_SESSION["cart"];
                        foreach ($cart as $value) {
                            $number += (int)$value["Amount"];
                            $total += (int)$value["Amount"] * (int)$value["Price"] * 0.75;
                        }
                    }
                    ?>
                    <li class="nav-item"><a class="nav-link" id="cart" href="checkout.php"><i
                                class="fa fa-shopping-cart"></i><span class="qty" id="qty">
                                <?php echo $number ?> </span>
                            <br>
                            <span id="total">
                                <?php echo number_format($total, 0, ',', '.') ?> VND
                            </span></a>

                    </li>

                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>

                    <?php
                    if (isset($_SESSION["username"])) {
                        $username = $_SESSION['username'];
                        echo '<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false" href="#">' . $username . '</a>
                       <div class="dropdown-menu">
                       <a class="dropdown-item" href="#">Change Password</a>  
                       <a class="dropdown-item" href="wishlist.php">My Whislist</a> 
                       <a class="dropdown-item" href="order.php">My Order</a> 
                           <a class="dropdown-item" href="logout.php">Logout</a>                                                  
                       </div>
                       </li>';
                    } else {
                        echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="page-heading about-heading header-text"
    style="background-image: url(assets/images/heading-6-1920x500.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-content">
                    <h4>Lorem ipsum dolor sit amet</h4>
                    <h2>Change Password</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <form class="login100-form validate-form" action="" method="post">
            <div class="form-group">
                <label for="oldPass">Old Password</label>
                <input type="password" class="form-control" name="oldPass" required>
            </div>
            <div id="errorPass" style="float:right;display: none; color: red; ">
                <i class="fa fa-exclamation-triangle"></i>
                <span>Password incorrect</span>
            </div>
            <div class="form-group">
                <label for="newPass">New Password</label>
                <input type="password" class="form-control" name="newPass" required>
            </div>
            <div class="form-group">
                <label for="confirmNewPass">Confirm New Password</label>
                <input type="password" class="form-control" name="confirmPass">
            </div>
            <div id="errorConfirm" style="float:right;display: none; color: red; " required>
                <i class="fa fa-exclamation-triangle"></i>
                <span>Password does not match</span>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="change">Submit</button>
            <?php
            if (isset($_SESSION["username"])) {
                $account = $_SESSION['username'];
                if (isset($_POST["change"])) {
                    $oldpass = $_POST["oldPass"];
                    $query = mysqli_query($connect, "
        select password from account where Account_Name = '$account' and isAdmin = 0");
                    while ($result = mysqli_fetch_array($query)) {
                        $pass = $result[0];
                        if ($pass != $oldpass) {
                            echo "<script>document.getElementById('errorPass').style.display='block';</script>";
                        } else {
                            $newpass = $_POST["newPass"];
                            $confirm = $_POST["confirmPass"];
                            if ($newpass == $confirm) {
                                $execute = mysqli_query($connect, "UPDATE `account` SET Password ='" . $newpass . "' where Account_Name = '$account' and isAdmin = 0");
                                echo "<script>document.getElementById('errorPass').style.display='block';</script>";
                                echo "<script>window.location.href='index.php';</script>";
                                $_SESSION['ChangePass'] = "Successful";
                            } else {
                                echo "<script>document.getElementById('errorConfirm').style.display='block';</script>";
                            }
                        }
                    }
                }
            }
            ?>
        </form>
    </div>
    <div class="col-sm-4"></div>
</div>

<?php include 'footer.php' ?>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/toast/toastr.min.js"></script>

<!-- Additional Scripts -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/owl.js"></script>

</html>