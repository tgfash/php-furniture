<?php include 'connection.php' ?>
<?php
ob_start();
session_start();
unset($_SESSION['cart']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Order</title>

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
                            <a class="dropdown-item" href="changepass.php">Change Password</a>  
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
                        <h2>Order</h2>
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
                            <h3>All orders</h3>
                        </div>
                    </div>
                    <br>
                    <br>
                    <hr style="height:5px;border-width:0;color:gray;background-color:gray">

                    <div class="row">
                        <div class="col-12">
                            <h4>Order Not Approved <i class="fa fa-close" style="color:red"></i></h4>
                        </div>
                    </div>
                    <br>
                    <?php
                    if (isset($_SESSION["username"])) {
                        $username = $_SESSION['username'];
                        $customer_name  = mysqli_fetch_array($connect->query("Select * from customer where username ='" . $username . "'"));
                        $name = $customer_name[2];
                        $totalRecords = mysqli_query($connect, "SELECT * FROM orders WHERE username = '" . $name . "' and status = 'NOT'");
                        while ($row = mysqli_fetch_array($totalRecords)) {
                            $resulta = mysqli_query($connect, "select sum(quantity) from ordersdetail join orders on ordersdetail.Order_Id = orders.order_id where username = '" . $name . "' and orders.order_id = '" . $row['order_id'] . "'");
                            while ($rowa = mysqli_fetch_array($resulta)) {
                                $amount = $rowa[0];
                            }
                            $resultb = mysqli_query($connect, "select sum(price*quantity) from ordersdetail join orders on ordersdetail.Order_Id = orders.order_id where username = '" . $name . "' and orders.order_id = '" . $row['order_id'] . "'");
                            while ($rowb = mysqli_fetch_array($resultb)) {
                                $money = $rowb[0];
                            }
                    ?>
                    <div class="row">
                        <div class="col-10">
                            <h4><?php echo $row['Order_Name'] ?></h4>
                        </div>
                        <div class="col-2">
                            <a onclick="return confirm('Do you want to cancle this order');"
                                href="order-delete.php?oid=<?php echo $row['order_id'] ?>"
                                class="btn btn-primary btn-block">Cancel</a>
                        </div>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-3">
                                    <em>User</em>
                                    <h5><?php echo $row['Username'] ?></h5>
                                </div>
                                <div class="col-3">
                                    <em>Date</em>
                                    <h5><?php echo $row['Date'] ?></h5>
                                </div>
                                <div class="col-3">
                                    <em>Amount of products</em>
                                    <h5><?php echo $amount ?></h5>
                                </div>
                                <div class="col-3  text-right">
                                    <em>Money</em>
                                    <h5><?php echo number_format($money) ?></h5>
                                </div>
                                <br>
                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#details" aria-expanded="false" aria-controls="details">Detail</button>

                                <?php
                                        $query = mysqli_query($connect, "SELECT * FROM ordersdetail WHERE Order_Id = '" . $row['order_id'] . "'");
                                        while ($row2 = mysqli_fetch_array($query)) {
                                            $query2 = mysqli_query($connect, "SELECT * from product WHERE product_id='" . $row2["Product_Id"] . "'");;
                                            while ($row3 = mysqli_fetch_array($query2)) {
                                                $pname = $row3[1];
                                                $image = $row3[8];
                                            }
                                        ?>
                                <div class="col">
                                    <div class="collapse multi-collapse" id="details">
                                        <div class="card card-body">
                                            <table>
                                                <tr>
                                                    <th class="text-center">Product Name</th>
                                                    <th class="text-center">Image</th>
                                                    <th class="text-center">Quantity</th>
                                                    <th class="text-center">Money</th>
                                                </tr>
                                                <tr>
                                                    <td><?php echo $pname ?></td>
                                                    <td><img src="assets/images/product/<?php echo $image ?>"
                                                            style="width: 100%; height: 100%;" alt="img">
                                                    </td>
                                                    <th class="text-center"><?php echo $row2['Quantity'] ?></th>
                                                    <th class="text-center">
                                                        <?php echo number_format($row2['Price'] * $row2['Quantity']) ?>
                                                    </th>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                        }
                                        ?>
                            </div>
                        </li>
                    </ul>
                    <hr>
                    <?php
                        }
                    }
                    ?>
                    <br>
                    <hr style=" height:2px;border-width:0;color:gray;background-color:gray">
                    <div class="row">
                        <div class="col-12">
                            <h4>Order Approved <i class="fa fa-check" style="color:green"></i></h4>
                        </div>
                    </div>
                    <br>
                    <br>
                    <?php
                    if (isset($_SESSION["username"])) {
                        $username = $_SESSION['username'];
                        $customer_name  = mysqli_fetch_array($connect->query("Select * from customer where username ='" . $username . "'"));
                        $name = $customer_name[2];
                        $totalRecords = mysqli_query($connect, "SELECT * FROM orders WHERE username = '" . $name . "' and status = 'YES'");
                        while ($row = mysqli_fetch_array($totalRecords)) {
                            $resulta = mysqli_query($connect, "select sum(quantity) from ordersdetail join orders on ordersdetail.Order_Id = orders.order_id where username = '" . $name . "' and orders.order_id = '" . $row['order_id'] . "'");
                            while ($rowa = mysqli_fetch_array($resulta)) {
                                $amount = $rowa[0];
                            }
                            $resultb = mysqli_query($connect, "select sum(price*quantity) from ordersdetail join orders on ordersdetail.Order_Id = orders.order_id where username = '" . $name . "' and orders.order_id = '" . $row['order_id'] . "'");
                            while ($rowb = mysqli_fetch_array($resultb)) {
                                $money = $rowb[0];
                            }
                    ?>
                    <div class="row">
                        <div class="col-12">
                            <h4><?php echo $row['Order_Name'] ?></h4>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-3">
                                    <em>User</em>
                                    <h5><?php echo $row['Username'] ?></h5>
                                </div>
                                <div class="col-3">
                                    <em>Date</em>
                                    <h5><?php echo $row['Date'] ?></h5>
                                </div>
                                <div class="col-3">
                                    <em>Amount of products</em>
                                    <h5><?php echo $amount ?></h5>
                                </div>
                                <div class="col-3  text-right">
                                    <em>Money</em>
                                    <h5><?php echo $money ?></h5>
                                </div>
                                <br>
                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#details" aria-expanded="false" aria-controls="details">Detail</button>

                                <?php
                                        $query = mysqli_query($connect, "SELECT * FROM ordersdetail WHERE Order_Id = '" . $row['order_id'] . "'");
                                        while ($row2 = mysqli_fetch_array($query)) {
                                            $query2 = mysqli_query($connect, "SELECT * from product WHERE product_id='" . $row2["Product_Id"] . "'");;
                                            while ($row3 = mysqli_fetch_array($query2)) {
                                                $pname = $row3[1];
                                                $image = $row3[8];
                                            }
                                        ?>
                                <div class="col">
                                    <div class="collapse multi-collapse" id="details">
                                        <div class="card card-body">
                                            <table>
                                                <tr>
                                                    <th class="text-center">Product Name</th>
                                                    <th class="text-center">Image</th>
                                                    <th class="text-center">Quantity</th>
                                                    <th class="text-center">Money</th>
                                                </tr>
                                                <tr>
                                                    <td><?php echo $pname ?></td>
                                                    <td><img src="assets/images/product/<?php echo $image ?>"
                                                            style="width: 100%; height: 100%;" alt="img">
                                                    </td>
                                                    <th class="text-center"><?php echo $row2['Quantity'] ?></th>
                                                    <th class="text-center">
                                                        <?php echo $row2['Price'] * $row2['Quantity'] ?></th>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                        }
                                        ?>
                            </div>
                        </li>
                    </ul>

                    <?php
                        }
                    }
                    ?>
                </li>
            </ul>

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