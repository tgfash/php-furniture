 <?php include 'connection.php' ?>
 <?php
    ob_start();
    session_start(); ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">
     <title>Wishlist</title>

     <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
         rel="stylesheet">


     <!-- Bootstrap core CSS -->
     <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

     <!-- Additional CSS Files -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="assets/css/style.css">
     <link rel="stylesheet" href="assets/css/owl.css">

 </head>

 <body>
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
     <!-- Page Content -->
     <div class="page-heading about-heading header-text"
         style="background-image: url(assets/images/heading-6-1920x500.jpg);">
         <div class="container">
             <div class="row">
                 <div class="col-md-12">
                     <div class="text-content">
                         <h4>Lorem ipsum dolor sit amet</h4>
                         <h2>Wishlist</h2>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="products call-to-action">
         <div class="container">
             <ul class="list-group list-group-flush">
                 <li class="list-group-item">
                     <div class="row">
                         <div class="col-12">
                             <h3>All items</h3>
                         </div>
                         <div class="col-3">
                             <em>Product Name</em>
                         </div>
                         <div class="col-3">
                             <em>Image</em>
                         </div>
                         <div class="col-3 text-right">
                             <em>Price</em>
                         </div>
                         <div class="col-3 text-right">
                             <em>Action</em>
                         </div>
                     </div>
                 </li>
             </ul>
             <?php
                $query = mysqli_query($connect, "SELECT Customer_Id from customer WHERE username='" . $username . "'");;
                while ($row = mysqli_fetch_array($query)) {
                    $Customerid = $row[0];
                }
                $result = mysqli_query($connect, "SELECT * FROM wishlist where Customer_Id = '" . $Customerid . "'");
                while ($row = mysqli_fetch_array($result)) {
                    $query2 = mysqli_query($connect, "SELECT * from product WHERE product_id='" . $row["Product_Id"] . "'");;
                    while ($row2 = mysqli_fetch_array($query2)) {
                        $pname = $row2[1];
                        $image = $row2[8];
                        $price = $row2[6];
                    }
                ?>
             <ul class="list-group list-group-flush">
                 <li class="list-group-item">
                     <div class="row">
                         <div class="col-3">
                             <em><?php echo $pname ?></em>
                         </div>
                         <div class="col-3">
                             <img src="./assets/images/product/<?php echo $image ?>">
                         </div>
                         <div class="col-3 text-right">
                             <em><?php echo number_format($price * 0.75) ?></em>
                         </div>
                         <div class="col-3 text-right">
                             <a onclick="return confirm('Do you want to delete this product from wishlist');"
                                 href="wishlist-delete.php?pid=<?php echo $row["Product_Id"]; ?>&cid=<?php echo $row["Customer_Id"]; ?>"><i
                                     class="fa fa-trash"></i></a>
                         </div>
                     </div>
                 </li>
             </ul>
             <?php

                }

                ?>


         </div>
     </div>

     <?php include 'footer.php' ?>





     <!-- Bootstrap core JavaScript -->
     <script src="vendor/jquery/jquery.min.js"></script>
     <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


     <!-- Additional Scripts -->
     <script src="assets/js/custom.js"></script>
     <script src="assets/js/owl.js"></script>
 </body>

 </html>