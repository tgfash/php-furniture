<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product Detail</title>

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
                            <a class="dropdown-item" href="wishlist.php">My Wishlist</a>  
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
                        <h2>Product Details</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="products">
        <div class="container">
            <div class="row">
                <?php include 'connection.php' ?>
                <?php
                if (isset($_GET["id"])) {
                    $id = $_GET["id"];
                    $query = "SELECT * FROM product where Product_Id = $id ";
                    $result = mysqli_query($connect, $query);
                }
                ?>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-4 col-xs-12">

                    <div>
                        <img src="assets/images/product/<?php echo $row['Image'] ?>" alt="" class=" img-fluid wc-image">
                    </div>


                </div>
                <div class="col-md-8 col-xs-12">
                    <form action="#" method="post" class="form">
                        <h2><?php echo $row['Product_Name'] ?></h2>
                        <br>
                        <h3 style="color: blue;"><?php echo ($row['Number'] == 0) ? "Out of stock" : "In Stock"; ?>
                        </h3>
                        <h3>Remaining : <?php echo $row['Number'] ?></h3>
                        <br>
                        <p class="lead">
                            <small><del>
                                    <?php echo number_format($row['Price'], 0, ',', '.') ?></del></small>
                            <strong
                                class="text-primary"><?php echo number_format($row['Price'] * 0.75, 0, ',', '.') ?></strong>
                        </p>

                        <br>

                        <p class="lead">
                            <?php echo $row['Info'] ?>
                        </p>

                        <br>

                        <div class="row">
                            <div class="col-sm-4">
                                <label class="control-label">Ship way</label>
                                <div class="form-group">
                                    <select class="form-control">
                                        <option value="0">SuperFast</option>
                                        <option value="1">Fash</option>
                                        <option value="2">Normal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <label class="control-label">Quantity</label>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="number" onkeydown="return false;" class="form-control" min="1"
                                                max="<?php echo (int)$row['Number'] ?>" placeholder="1">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <?php
                                                $abc = '';
                                                if (isset($_SESSION["cart"])) {
                                                    if (isset($_SESSION["cart"][$row['Product_Id']]['Amount'])) {
                                                        $num = $_SESSION["cart"][$row['Product_Id']]['Amount'];
                                                        if ($num == $row['Number']) {
                                                            $abc = 'Not Ok';
                                                        }
                                                    }
                                                }
                                                if ($row['Number'] != 0 && $abc != 'Not Ok') {
                                                ?>
                                        <a href="#" onclick="addCart(<?php echo $row['Product_Id'] ?>)"
                                            class="btn btn-primary btn-block">Add to Cart</a>
                                        <?php } ?>
                                        <a href="wishlist1.php?id=<?php echo $row['Product_Id'] ?>"
                                            style="color: white;background-color: #D81848;"
                                            class="btn btn-primary btn-block">Add
                                            to wishlist <i class="fa fa-heart"></i></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                            </div>
                            <div class="col-sm-8">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6"></div>
                            </div>
                    </form>
                </div>
                <?php
                    }
                }
                ?>

            </div>
        </div>
    </div>
    <br>
    <br>
    <?php
    if (isset($_POST['content'])) {
        $content = $_POST['content'];
        $product_id = $_GET['id'];
        $user_id  = mysqli_fetch_array($connect->query("Select * from customer where username ='" . $username . "'"));
        $customer_id = $user_id[0];
        $connect->query("INSERT INTO comment (Customer_Id, Product_Id, Date , Content) VALUES ($customer_id, $product_id,now(),'$content')");
        $_POST['content'] = array();
    }
    ?>
    <div class="comments">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Comment</h2>
                        <?php
                        $totalRecords = mysqli_query($connect, "SELECT * FROM comment where Product_Id = '" .  $id . "'");
                        foreach ($totalRecords as $record) {
                            $usercmt  = mysqli_fetch_array($connect->query("Select * from customer where customer_id ='" . $record['Customer_Id'] . "'")); ?>
                        <div class="container mt-5">
                            <div class="row  d-flex justify-content-center">
                                <div class="col-md-12">
                                    <div class="headings d-flex justify-content-between align-items-center mb-3">
                                    </div>
                                    <div class="card p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="user d-flex flex-row align-items-center">
                                                <img src="./assets/images/avt.jpg" width="30"
                                                    class="user-img rounded-circle mr-2">
                                                <span><small
                                                        class="font-weight-bold text-primary"><?= $usercmt[3] ?></small>
                                                    <small
                                                        class="font-weight-bold"><?= $record['Content'] ?></small></span>
                                            </div>
                                            <small><?= $record['Date'] ?></small>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                        <?php
                        }
                        ?>
                        <br>
                        <form method="post">
                            <section>
                                <textarea name="content" style="width: 100%;" rows="5"
                                    placeholder="Write some comments here ..."></textarea>
                            </section>
                            <section>
                                <input type="submit" value="Submit" class="btn btn-primary btn-block ">
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Similar Products</h2>
                        <a href="products.php">view more <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <?php 
                 if (isset($_GET["id"])) {
                    $id = $_GET["id"];
                $resultt = mysqli_query($connect,"SELECT * FROM `product` WHERE category_id = (SELECT Category_Id from product where Product_Id = $id ) and Product_Id != '".$id."' LIMIT 3");
                while($roww = mysqli_fetch_array($resultt)){
                ?>
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="product-details.php?id=<?php echo $roww['Product_Id'] ?>"><img
                                src="assets/images/product/<?php echo $roww['Image'] ?>" alt=""></a>
                        <div class="down-content">
                            <a href="product-details.php?id=<?php echo $roww['Product_Id'] ?>">
                                <h4><?php echo $roww['Product_Name']?></h4>
                            </a>
                            <h6><small><del><?php echo $roww['Price'] ?></del>
                                </small><?php echo $roww['Price'] * 0.75 ?>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>


            </div>
        </div>
    </div>

    <?php include 'footer.php ' ?>




    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script>
    function addCart(id) {
        $.post("checkout.php", {
            'id': id
        }, function(data, status) {
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
                "timeOut": "1000",
                "extendedTimeOut": "500",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"]("Add to Cart Successfully!", "Success")
            setTimeout(function() {
                location.reload();
            }, 1000);
        });
    }
    </script>
    <?php
    if (isset($_SESSION['AddWL'])) { ?>
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
    toastr["success"]("Add to Wishlist Successfully!", "Success")
    <?php }
        unset($_SESSION['AddWL']) ?>
    </script>
    <?php
        if (isset($_SESSION['NotAddWL'])) { ?>
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
    toastr["error"]("Product exists in Your Wishlist", "Error")
    <?php }
            unset($_SESSION['NotAddWL']) ?>
    </script>
</body>

</html>