<?php include 'connection.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product</title>
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
    <?php include 'header.php'; ?>

    <!-- Page Content -->
    <div class="page-heading about-heading header-text"
        style="background-image: url(assets/images/heading-6-1920x500.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4>Lorem ipsum dolor sit amet</h4>
                        <h2>Products</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="products">
        <div class="container">
            <div class="row" style="padding-bottom: 20px;">
                <div class="col-sm-10">
                    <form id="product_search" action="" method="GET">
                        <label>Search</label>
                        <input type="text" name="name" class="form-control" />

                </div>
                <div class="col-sm-2">
                    <br>
                    <button style="margin-top: 8px;margin-left: -25px;" type="submit" class="btn btn-primary">
                        <i class="fa fa-search"></i>
                    </button>
                    </form>
                </div>

            </div>
            <hr style="height:5px;border-width:0;color:gray;background-color:gray">
            <div class="row">
                <?php include 'connection.php' ?>
                <?php
                $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 3;
                $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
                $offset = ($current_page - 1) * $item_per_page;
                $search = isset($_GET['name']) ? $_GET['name'] : "";
                if ($search) {
                    $where = "WHERE 'Product_Name' LIKE N'" . $search . "%'";
                }
                if ($search) {
                    $query = "select * from product where Product_Name like N'" . $search . "%' order by `product_id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                    $totalRecords = mysqli_query($connect, "select * from product where Product_Name like N'" . $search . "%'");
                } else {
                    $query = "SELECT * FROM product order by `product_id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                    $totalRecords = mysqli_query($connect, "SELECT * FROM product");
                }
                $totalRecords = $totalRecords->num_rows;
                $totalPages = ceil($totalRecords / $item_per_page);
                $execute = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_array($execute)) {
                ?>

                <div class="col-md-4">
                    <div class="product-item">
                        <a href="product-details.php?id=<?php echo $row['Product_Id'] ?>"><img
                                src="assets/images/product/<?php echo $row['Image'] ?>" alt=""></a>
                        <div class="down-content">
                            <a href="product-details.php?id=<?php echo $row['Product_Id'] ?>">
                                <h4><?php echo $row['Product_Name'] ?></h4>
                            </a>
                            <h6><small><del> <?php echo number_format($row['Price'], 0, ',', '.') ?></del> </small>
                                <?php echo number_format($row['Price'] *0.75, 0, ',', '.') ?>
                            </h6>
                            <p><?php echo $row['Info'] ?></p>
                            <a href="wishlist1.php?id=<?php echo $row['Product_Id'] ?>"
                                style="color: white;background-color: #D81848;" class="btn btn-info btn-sm">Add
                                to wishlist <i class="fa fa-heart"></i></a>
                            <?php
                                $result = '';
                                if (isset($_SESSION["cart"])) {
                                    if (isset($_SESSION["cart"][$row['Product_Id']]['Amount'])) {
                                        $num = $_SESSION["cart"][$row['Product_Id']]['Amount'];
                                        if ($num == $row['Number']) {
                                            $result = 'Not Ok';
                                        }
                                    }
                                }

                                if ($row['Number'] != 0 && $result != 'Not Ok') {
                                ?>
                            <button style="float: right;" onclick="addCart(<?php echo $row['Product_Id'] ?>)"
                                class="btn btn-info btn-sm">Add to
                                cart <i class="fa fa-shopping-cart"></i></button>
                            <?php

                                } ?>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>

                <div class="col-md-12">
                    <ul class="pages">
                        <?php
                        if ($current_page > 3) {
                            $first_page = 1; ?>
                        <li><a href="?per_page=<?= $item_per_page ?>&page=<?= $first_page ?>">First</a></li>
                        <?php
                        }
                        if ($current_page > 1) {
                            $prev_page = $current_page - 1;
                        ?>
                        <li><a href="?per_page=<?= $item_per_page ?>&page=<?= $prev_page ?>">Prev</a></li>
                        <?php }
                        ?>

                        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                        <?php if ($i != $current_page) { ?>
                        <?php if ($i > $current_page - 3 && $i < $current_page + 3) { ?>
                        <li><a href="?per_page=<?= $item_per_page ?>&page=<?= $i ?>"><?= $i ?></a></li>
                        <?php } ?>
                        <?php } else { ?>
                        <li><strong style="color: yellowgreen;""><?= $i ?></strong></li>
                        <?php } ?>
                        <?php } ?>
                        <?php
                        if ($current_page < $totalPages - 1) {
                            $next_page = $current_page + 1; ?>
                                 <li><a href=" ?per_page=<?= $item_per_page ?>&page=<?= $next_page ?>">Next</a></li>
                        <?php }
                        if ($current_page < $totalPages - 3) {
                            $end_page = $totalPages;
                            ?>
                        <li><a href=" ?per_page=<?= $item_per_page ?>&page=<?= $end_page ?>">Last</a></li>
                        <?php }
                            ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <!-- Modal -->
    <div class=" modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="contact-form">
                        <form action="#" id="contact">
                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset>
                                        <input type="text" class="form-control" placeholder="Pick-up location"
                                            required="">
                                    </fieldset>
                                </div>

                                <div class="col-md-6">
                                    <fieldset>
                                        <input type="text" class="form-control" placeholder="Return location"
                                            required="">
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset>
                                        <input type="text" class="form-control" placeholder="Pick-up date/time"
                                            required="">
                                    </fieldset>
                                </div>

                                <div class="col-md-6">
                                    <fieldset>
                                        <input type="text" class="form-control" placeholder="Return date/time"
                                            required="">
                                    </fieldset>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="Enter full name" required="">

                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset>
                                        <input type="text" class="form-control" placeholder="Enter email address"
                                            required="">
                                    </fieldset>
                                </div>

                                <div class="col-md-6">
                                    <fieldset>
                                        <input type="text" class="form-control" placeholder="Enter phone" required="">
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Book Now</button>
                </div>
            </div>
        </div>
    </div>


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
    <script src="vendor/jquery/jquery.min.js"></script>
</body>

</html>