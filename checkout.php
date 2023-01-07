<?php include 'connection.php' ?>
<?php
ob_start();
session_start();
if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $sqlSelectProduct = "SELECT * FROM Product WHERE Product_Id =" . $id;
    $result = mysqli_query($connect, $sqlSelectProduct);
    $row = mysqli_fetch_row($result);

    if (!isset($_SESSION["cart"])) {
        $cart[$id] = array(
            'Product_Id' => $row[0],
            'Product_Name' => $row[1],
            'Material_Id' => $row[2],
            'Country_Id' => $row[3],
            'Warranty' => $row[4],
            'Info' => $row[5],
            'Price' => $row[6],
            'Category_Id' => $row[7],
            'Image' => $row[8],
            'Amount' => 1
        );
    } else {
        $cart = $_SESSION["cart"];
        if (array_key_exists($id, $cart)) {
            if ((int)$cart[$id]["Amount"] == $row[9]) {
                $cart[$id] = array(
                    'Product_Id' => $row[0],
                    'Product_Name' => $row[1],
                    'Material_Id' => $row[2],
                    'Country_Id' => $row[3],
                    'Warranty' => $row[4],
                    'Info' => $row[5],
                    'Price' => $row[6],
                    'Category_Id' => $row[7],
                    'Image' => $row[8],
                    'Amount' => $row[9]
                );
            } else
                $cart[$id] = array(
                    'Product_Id' => $row[0],
                    'Product_Name' => $row[1],
                    'Material_Id' => $row[2],
                    'Country_Id' => $row[3],
                    'Warranty' => $row[4],
                    'Info' => $row[5],
                    'Price' => $row[6],
                    'Category_Id' => $row[7],
                    'Image' => $row[8],
                    'Amount' => (int)$cart[$id]["Amount"] + 1
                );
        } else {
            $cart[$id] = array(
                'Product_Id' => $row[0],
                'Product_Name' => $row[1],
                'Material_Id' => $row[2],
                'Country_Id' => $row[3],
                'Warranty' => $row[4],
                'Info' => $row[5],
                'Price' => $row[6],
                'Category_Id' => $row[7],
                'Image' => $row[8],
                'Amount' => 1
            );
        }
    }
    $_SESSION["cart"] = $cart;
    // echo "<prE>";
    // print_r($_SESSION["cart"]);
    $number = 0;
    $total = 0;
    foreach ($cart as $value) {
        $number += (int)$value["Amount"];
        $total += (int)$value["Amount"] * (int)$value["Price"] * 0.75;
    }
    echo $number . "-" . $total;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Checkout</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">


    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
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
                        <h2>Checkout</h2>
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
                        <div class="col-5">
                            <em>Product Name</em>
                        </div>
                        <div class="col-4">
                            <em>Image</em>
                        </div>
                        <div class="col-1 text-center">
                            <em>Number</em>
                        </div>
                        <div class="col-1 text-right">
                            <em>Price</em>
                        </div>
                        <div class="col-1 text-right">
                            <em>Price</em>
                        </div>
                    </div>
                </li>
            </ul>
            <?php
            $number = 0;
            $total = 0;
            if (isset($_SESSION["cart"])) {
                $cart = $_SESSION["cart"];
                foreach ($cart as $value) {
                    $total += (int)$value["Amount"] * (int)$value["Price"] * 0.75;
            ?>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-5">
                            <em><?php echo $value["Product_Name"] ?></em>
                        </div>
                        <div class="col-4">
                            <img src="./assets/images/product/<?php echo $value["Image"] ?>">
                        </div>
                        <div class="col-1">
                            <em><?php echo $value["Amount"] ?></em>
                        </div>
                        <div class="col-1 text-right">
                            <em><?php echo $value["Amount"] * $value["Price"] * 0.75 ?></em>
                        </div>
                        <div class="col-1 text-right">
                            <a onclick="return confirm('Do you want to delete this product from cart');"
                                href="checkout-delete.php?pid=<?php echo $value["Product_Id"]; ?>"><i
                                    class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </li>
            </ul>
            <?php }
                ?>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-6">
                            <em>Sub-total</em>
                        </div>

                        <div class="col-6 text-right">
                            <strong><?php echo $total ?> VNĐ</strong>
                        </div>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="row">
                        <div class="col-6">
                            <em>Ship</em>
                        </div>

                        <div class="col-6 text-right">
                            <strong>50000 VNĐ</strong>
                        </div>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="row">
                        <div class="col-6">
                            <em>Tax</em>
                        </div>

                        <div class="col-6 text-right">
                            <strong><?php echo $total * 0.1 ?> VNĐ</strong>
                        </div>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="row">
                        <div class="col-6">
                            <em>Total</em>
                        </div>

                        <div class="col-6 text-right">
                            <strong><?php echo $total * 1.1 + 50000 ?> VNĐ</strong>
                        </div>
                    </div>
                </li>


            </ul>
            <?php
            }
            ?>
            <br>

            <div class="inner-content">
                <div class="contact-form">
                    <form action="#" method="POST">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Name:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Email:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Location:</label>
                                    <input type="text" class="form-control" name="location">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Phone:</label>
                                    <input type="text" class="form-control" name="phone">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">
                                <input type="checkbox">

                                I agree with the <a href="terms.php" target="_blank">Terms &amp; Conditions</a>
                            </label>
                        </div>

                        <div class="clearfix">
                            <a href="products.php" class="filled-button float-left">Back</a>
                            <a href="checkout.php?purchase" class="filled-button float-right">Purchase</a>
                            <?php
                            $date = date("Y-m-d");
                            if (isset($_GET['purchase'])) {
                                if (isset($_SESSION["username"])) {
                                    $username = $_SESSION['username'];
                                    $customer_name  = mysqli_fetch_array($connect->query("Select * from customer where username ='" . $username . "'"));
                                    $name = $customer_name[2];
                                    // $location = $_POST['location'];
                                    // $phone = $_POST['phone'];
                                    // mysqli_query($connect,"UPDATE `customer` SET `Location`='$location',`Phone`='$phone' WHERE   Customer_Name = '".$name."'");
                                    mysqli_query($connect, "INSERT INTO `orders`(`Order_Name`, `Date`, `Username`, `Status`) VALUES ('New Order','" . $date . "','" . $name . "','NOT')");
                                    $ordersid = mysqli_insert_id($connect);
                                    mysqli_query($connect, "UPDATE `orders` SET `Order_Name`='Order " . $ordersid . "' where order_id='" . $ordersid . "'");
                                    if (isset($_SESSION["cart"])) {
                                        $cart = $_SESSION["cart"];
                                        foreach ($cart as $value) {
                                            mysqli_query($connect, "INSERT INTO `ordersdetail`(`Product_Id`, `Order_Id`, `Price`, `Quantity`) VALUES ('" . $value["Product_Id"] . "','" . $ordersid . "','" . $value["Price"] * 0.75 * $value["Amount"] . "','" . $value["Amount"] . "')");
                                            
                                        }
                                    }
                                }
                                echo "<script>window.location.href='order.php';</script>";
                            }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
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