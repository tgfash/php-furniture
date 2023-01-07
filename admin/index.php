<?php include 'connection.php' ?>
<?php
session_start(); ?>
<!Doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendor/toast/toastr.css">
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/toast/toastr.min.js"></script>
    <title>Home</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.php?home">Mango</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>
                        <!-- <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span
                                    class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img
                                                            src="assets/images/avatar-2.jpg" alt=""
                                                            class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span
                                                            class="notification-list-user-name">Jeremy
                                                            Rakestraw</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img
                                                            src="assets/images/avatar-3.jpg" alt=""
                                                            class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span
                                                            class="notification-list-user-name">John Abraham </span>is
                                                        now following you
                                                        <div class="notification-date">2 days ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img
                                                            src="assets/images/avatar-4.jpg" alt=""
                                                            class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span
                                                            class="notification-list-user-name">Monaan Pechi</span> is
                                                        watching your main repository
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img
                                                            src="assets/images/avatar-5.jpg" alt=""
                                                            class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span
                                                            class="notification-list-user-name">Jessica
                                                            Caruso</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"> <a href="#">View all notifications</a></div>
                                </li>
                            </ul>
                        </li> -->
                        <?php
                        if (isset($_SESSION["adminun"])) {
                            $adun = $_SESSION["adminun"];
                            $queryacc = mysqli_query($connect, "Select username from account where account_name= '" . $adun . "'");
                            while ($rowacc = mysqli_fetch_array($queryacc)) {

                        ?>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                                aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $rowacc[0]; ?></h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="logout.php"><i
                                        class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="index.php?home"><i
                                        class="fa fa-fw fa-user-circle"></i>Dashboard</a>

                            </li>

                            <li class="nav-divider">
                                Features
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i>
                                    Product </a>
                                <div id="submenu-6" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="add.php"><i class="fas fa-fw fa-plus"></i>Add</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?edit"><i
                                                    class="fas fa-fw fa-edit"></i>Edit</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?delete"><i
                                                    class="fas fa-fw fa-trash"></i>Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-fw fa-user"></i>
                                    User </a>
                                <div id="submenu-7" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?users"><i
                                                    class="far fa-address-card"></i>Account</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?view"><i
                                                    class="fa fa-info-circle"></i>Infomation</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-8" aria-controls="submenu-8"><i
                                        class="	far fa-paper-plane"></i>
                                    Order </a>
                                <div id="submenu-8" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?notapproved"><i class="fa fa-times"
                                                    style="color: red;"></i>Not
                                                Approved</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?approved"><i class="fa fa-check"
                                                    style="color:green"></i>Approved</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-9" aria-controls="submenu-9"><i
                                        class="	far fa-paper-plane"></i>
                                    Others </a>
                                <div id="submenu-9" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?comment"><i class="fa fa-comment"></i>
                                                Comment</a>
                                        </li>

                                        <li class=" nav-item">
                                            <a class="nav-link" href="index.php?blog"><i
                                                    class="fab fa-blogger-b"></i>Blog</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">

            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <?php
                        if (isset($_GET['home'])) {
                            $a = mysqli_query($connect, "SELECT sum(price) FROM orders JOIN ordersdetail on orders.order_id = ordersdetail.Order_Id where status = 'YES' ");
                            while ($b = mysqli_fetch_array($a)) {
                                $totalMoney = $b[0];
                            }
                            $c = mysqli_query($connect, "select sum(price)/count(username) from ordersdetail join orders on ordersdetail.Order_Id = orders.order_id where STATUS = 'Yes' ");
                            while ($d = mysqli_fetch_array($c)) {
                                $avgMoney = $d[0];
                            }
                            $e = mysqli_query($connect, "select count(username) from ordersdetail join orders on ordersdetail.Order_Id = orders.order_id where STATUS = 'Yes' ");
                            while ($f = mysqli_fetch_array($e)) {
                                $numP = $f[0];
                            }
                            $g = mysqli_query($connect, "select count(order_id) from orders where STATUS = 'Yes' ");
                            while ($h = mysqli_fetch_array($g)) {
                                $numO = $h[0];
                            }
                            echo "<br />";
                        ?>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-muted">Total Revenue</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1"><?php echo number_format($totalMoney, 0); ?></h1>
                                    </div>
                                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                        <span><i class="fa fa-fw fa-arrow-up"></i></span><span>100%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-muted">Orders Approved</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1"><?php echo $numO ?></h1>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-muted">Amount of Products</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1"><?php echo $numP
                                                                ?></h1>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-muted">Avg. Revenue Per Product</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1"><?php echo number_format($avgMoney, 0);
                                                                ?></h1>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php 
                        //Lam tuong tu voi cac category con lai 
                        $qChair = mysqli_query($connect,"select count(product_id) from product join category on product.Category_Id = category.Category_Id WHERE product.Category_Id = 'CH';");
                        while($row = mysqli_fetch_array($qChair)){
                            $numChair = $row[0];
                        ?>
                        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                            <div id="piechart" style="width: 100%; height: 450px;">
                                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js">
                                </script>

                                <script type="text/javascript">
                                google.charts.load('current', {
                                    'packages': ['corechart']
                                });
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {

                                    var data = google.visualization.arrayToDataTable([
                                        ['Category', 'Num per Category'],
                                        ['Bàn', 2],
                                        ['Ghế', <?php echo $numChair ?>],
                                        ['Tủ', 1],
                                        ['Đồng hồ', 1],
                                        ['Đèn', 1],
                                        ['Chảo', 1],
                                        ['Quạt', 1],
                                        ['Tranh', 1],
                                        ['Kệ', 5]

                                    ]);
                                    var options = {
                                        title: 'My Number of Products per Categories'
                                    };

                                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                                    chart.draw(data, options);
                                }
                                </script>
                            </div>
                        </div>

                        <?php
                            }
                        ?>
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Sales By Country Traffic Source</h5>
                                <div class="card-body p-0">
                                    <ul class="country-sales list-group list-group-flush">
                                        <li class="country-sales-content list-group-item"><span class="mr-2"><i
                                                    class="flag-icon flag-icon-vn" title="vn" id="vn"></i> </span>
                                            <span class="">Vietnam</span><span class="float-right text-dark">100%</span>
                                        </li>
                                        <li class="list-group-item country-sales-content"><span class="mr-2"><i
                                                    class="flag-icon flag-icon-ca" title="ca" id="ca"></i></span><span
                                                class="">Canada</span><span class="float-right text-dark">0%</span>
                                        </li>
                                        <li class="list-group-item country-sales-content"><span class="mr-2"><i
                                                    class="flag-icon flag-icon-ru" title="ru" id="ru"></i></span><span
                                                class="">Russia</span><span class="float-right text-dark">0%</span>
                                        </li>
                                        <li class="list-group-item country-sales-content"><span class=" mr-2"><i
                                                    class="flag-icon flag-icon-us" title="us" id="us"></i></span><span
                                                class="">America</span><span class="float-right text-dark">0%</span>
                                        </li>
                                        <li class="list-group-item country-sales-content"><span class=" mr-2"><i
                                                    class="flag-icon flag-icon-fr" title="fr" id="fr"></i></span><span
                                                class="">France</span><span class="float-right text-dark">0%</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="#" class="btn-primary-link">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->

                        <!-- recent orders  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Recent Orders</h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0">Order Id</th>
                                                    <th class="border-0">Order Name</th>
                                                    <th class="border-0">Product Name</th>
                                                    <th class="border-0">Image</th>
                                                    <th class="border-0">Number of products</th>
                                                    <th class="border-0">Money</th>
                                                    <th class="border-0">Order Time</th>
                                                    <th class="border-0">Customer</th>
                                                    <th class="border-0">Status</th>
                                                </tr>
                                            </thead>

                                            <?php 
                            $currentOrder = mysqli_query($connect,"SELECT * FROM `orders` join `ordersdetail` on orders.order_id = ordersdetail.order_id WHERE Date < NOW() order by date DESC limit 5");
                            while($cO = mysqli_fetch_array($currentOrder)){
                                $product = mysqli_query($connect,"SELECT Product_Name,Image from product where product_Id = '".$cO[5]."'");
                                while($myResult = mysqli_fetch_array($product)){
                                ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $cO[0]?></td>
                                                    <td><?php echo $cO[1]?> </td>
                                                    <td><?php echo $myResult[0]?></td>
                                                    <td>
                                                        <div class="m-r-10"><img
                                                                src="../assets/images/product/<?php echo $myResult[1]; ?>"
                                                                alt="img" class="rounded" width="60"></div>
                                                    </td>
                                                    <td><?php echo $cO[8]?></td>
                                                    <td><?php echo $cO[7]?></td>
                                                    <td><?php echo $cO[2]?></td>
                                                    <td><?php echo $cO[3]?></td>
                                                    <?php
                                                    if($cO[4] == 'NOT'){
                                                        echo '  <td ><span class="badge-dot badge-brand mr-1"></span>Not Approved </td>';
                                                    }else{
                                                        echo '  <td style="color:green;"><i
                                                        class="fas fa-check"></i> Approved </td>';
                                                    }
                                                    ?>

                                                </tr>
                                                <?php
                                                }
                                }
                                ?>
                                                <tr>
                                                    <td colspan="9"><a href="index.php?notapproved"
                                                            class="btn btn-outline-light float-right">View Details</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end recent orders  -->

                    </div>
                    <?php
                            if (isset($_SESSION['Login'])) { ?>
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
                    toastr["success"]("Login Successfully!", "Success")


                    <?php }
                                unset($_SESSION['Login'])
                                    ?>
                    </script>
                    <?php
                        }

                            ?>

                    <?php
                            if (isset($_GET['edit'])) {
                                echo "<h2>Edit Product</h2>";
                                echo "<br />";
                            ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">ID</th>
                                    <th class="border-0">Image</th>
                                    <th class="border-0">Product Name</th>
                                    <th class="border-0">Material</th>
                                    <th class="border-0">Country</th>
                                    <th class="border-0">Warranty</th>
                                    <th class="border-0">Price</th>
                                    <th class="border-0">Category</th>
                                    <th class="border-0">Number in stock</th>
                                    <th class="border-0">Action</th>
                                </tr>
                            </thead>
                            <?php
                                        $totalRecords = mysqli_query($connect, "SELECT * FROM product");

                                        while ($row = mysqli_fetch_array($totalRecords)) {
                                            $result1 = mysqli_query($connect, "SELECT Material_Name from material WHERE material_id='" . $row[2] . "'");
                                            while ($row1 = mysqli_fetch_array($result1)) {
                                                $material = $row1[0];
                                            }
                                            $result2 = mysqli_query($connect, "SELECT Country_Name from country WHERE country_id='" . $row[3] . "'");;
                                            while ($row2 = mysqli_fetch_array($result2)) {
                                                $country = $row2[0];
                                            }
                                            $result3 = mysqli_query($connect, "SELECT Category_Name from category WHERE category_id='" . $row[7] . "'");;
                                            while ($row3 = mysqli_fetch_array($result3)) {
                                                $category = $row3[0];
                                            }
                                        ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row[0]; ?></td>
                                    <td>
                                        <div class="m-r-10"><img src="../assets/images/product/<?php echo $row[8]; ?>"
                                                alt="img" class="rounded" width="60"></div>
                                    </td>
                                    <td><?php echo $row[1]; ?> </td>
                                    <td><?php echo $material ?> </td>
                                    <td><?php echo $country ?></td>
                                    <td><?php echo $row[4]; ?></td>
                                    <td><?php echo $row[6]; ?></td>
                                    <td><?php echo $category ?> </td>
                                    <td><?php echo $row[9]; ?></td>
                                    <td> <a href="edit.php?id=<?php echo $row[0]; ?>"><i
                                                class="fas fa-fw fa-edit"></i></a></td>
                                </tr>
                                <?php
                                        } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                            }

                            ?>
                    <?php
                            if (isset($_GET['delete'])) {
                                echo "<h2>Delete Product</h2>";
                                echo "<br />";
                            ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">ID</th>
                                    <th class="border-0">Image</th>
                                    <th class="border-0">Product Name</th>
                                    <th class="border-0">Material</th>
                                    <th class="border-0">Country</th>
                                    <th class="border-0">Warranty</th>
                                    <th class="border-0">Price</th>
                                    <th class="border-0">Category</th>
                                    <th class="border-0">Number in stock</th>
                                    <th class="border-0">Action</th>
                                </tr>
                            </thead>
                            <?php
                                        $totalRecords = mysqli_query($connect, "SELECT * FROM product");

                                        while ($row = mysqli_fetch_array($totalRecords)) {
                                            $result1 = mysqli_query($connect, "SELECT Material_Name from material WHERE material_id='" . $row[2] . "'");
                                            while ($row1 = mysqli_fetch_array($result1)) {
                                                $material = $row1[0];
                                            }
                                            $result2 = mysqli_query($connect, "SELECT Country_Name from country WHERE country_id='" . $row[3] . "'");;
                                            while ($row2 = mysqli_fetch_array($result2)) {
                                                $country = $row2[0];
                                            }
                                            $result3 = mysqli_query($connect, "SELECT Category_Name from category WHERE category_id='" . $row[7] . "'");;
                                            while ($row3 = mysqli_fetch_array($result3)) {
                                                $category = $row3[0];
                                            }
                                        ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row[0]; ?></td>
                                    <td>
                                        <div class="m-r-10"><img src="../assets/images/product/<?php echo $row[8]; ?>"
                                                alt="img" class="rounded" width="60"></div>
                                    </td>
                                    <td><?php echo $row[1]; ?> </td>
                                    <td><?php echo $material ?> </td>
                                    <td><?php echo $country ?></td>
                                    <td><?php echo $row[4]; ?></td>
                                    <td><?php echo $row[6]; ?></td>
                                    <td><?php echo $category ?> </td>
                                    <td><?php echo $row[9]; ?></td>
                                    <td> <a onclick="return confirm('Do you want to delete this product');"
                                            href="delete.php?id=<?php echo $row[0]; ?>"><i
                                                class="fas fa-fw fa-trash"></i></a></td>
                                </tr>


                            </tbody>
                            <?php
                                        }
                                        ?>
                        </table>
                    </div>
                    <?php }
                            ?>

                    <?php
                            if (isset($_GET['users'])) {
                                echo "<h2>Manage Users</h2>";
                                echo "<br />";
                            ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">ID</th>
                                    <th class="border-0">Name</th>
                                    <th class="border-0">Username</th>
                                    <th class="border-0">Password</th>
                                    <th class="border-0">Edit</th>
                                    <th class="border-0">Delete</th>
                                </tr>
                            </thead>
                            <?php
                                        $totalRecords = mysqli_query($connect, "SELECT * FROM account where isAdmin = 0");

                                        while ($row = mysqli_fetch_array($totalRecords)) {

                                        ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row[0]; ?></td>
                                    <td><?php echo $row[1]; ?> </td>
                                    <td><?php echo $row[2]; ?> </td>
                                    <td><?php echo str_repeat("*", strlen($row[3])); ?></td>

                                    <td> <a href="index.php?action=editu&uid=<?php echo $row[0]; ?> "><i
                                                class="fas fa-fw fa-edit"></i></a></td>
                                    <td> <a onclick="return confirm('Do you want to delete this account');"
                                            href="manageuser/delete.php?id=<?php echo $row[0]; ?>"><i
                                                class="fas fa-fw fa-trash"></i></a></td>

                                    </td>

                                </tr>


                            </tbody>
                            <?php
                                        }
                                        ?>

                            <?php
                                    }
                                    if (isset($_GET['action']) && $_GET['action'] == 'editu' && $_GET['uid']) {
                                        $userid = $_GET['uid'];
                                        $sql = mysqli_query($connect, "SELECT * FROM customer WHERE account_id = '" . $userid . "'");
                                        while ($row4 = mysqli_fetch_array($sql)) {
                                            $resultp = mysqli_query($connect, "SELECT password from account WHERE account_name='" . $row4[3] . "'");
                                            while ($rowp = mysqli_fetch_array($resultp)) {
                                                $password = $rowp[0];
                                            }
                                        ?>
                            <form action="" method="POST">
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="<?php echo $row4[2]; ?>">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="username">User</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            value="<?php echo $row4[3]; ?>">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="<?php echo $password; ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="location">Location</label>
                                        <input type="text" class="form-control" id="location" name="location"
                                            value="<?php echo $row4[4]; ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            value="<?php echo $row4[5]; ?>">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block text-uppercase">Update
                                        Account
                                    </button>
                                </div>
                            </form>

                            <?php
                                            if (isset($_POST['name'])) {
                                                $sqle = "UPDATE `customer` SET `Customer_Name`='$_POST[name]',`Username`='$_POST[username]',`Location`='$_POST[location]',`Phone`='$_POST[phone]' WHERE Customer_id = '" . $userid . "'";
                                                mysqli_query($connect, $sqle);
                                                $sqld = "UPDATE `account` SET `Password`='$_POST[password]' WHERE Account_id = '" . $row4[1] . "'";
                                                mysqli_query($connect, $sqld);
                                                echo "<script>window.location.href='index.php?view';</script>";
                                            }
                                        }
                                    }
                                    ?>

                            <?php
                                    if (isset($_GET['view'])) {
                                        echo "<h2>Detail Users</h2>";
                                        echo "<br />";
                                    ?>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">ID</th>
                                            <th class="border-0">UserName</th>
                                            <th class="border-0">Account</th>
                                            <th class="border-0">Password</th>
                                            <th class="border-0">Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                                $totalRecords = mysqli_query($connect, "SELECT * FROM account where isAdmin = 0");
                                                while ($row = mysqli_fetch_array($totalRecords)) {
                                                ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row[0]; ?></td>
                                            <td><?php echo $row[1]; ?> </td>
                                            <td><?php echo $row[2]; ?> </td>
                                            <td><?php echo str_repeat("*", strlen($row[3])); ?></td>
                                            <td><a href="index.php?action=user&uid=<?php echo $row[0]; ?>"><i
                                                        class="fas fa-fw fa-eye"></i></a>
                                            </td>

                                        </tr>


                                    </tbody>
                                    <?php
                                                }
                                            }
                                            if (isset($_GET['action']) && $_GET['action'] == 'user' && $_GET['uid']) {
                                                $userid = $_GET['uid'];
                                                $sql = mysqli_query($connect, "SELECT * FROM customer WHERE account_id = '" . $userid . "'");
                                                while ($row4 = mysqli_fetch_array($sql)) {
                                                    $resultp = mysqli_query($connect, "SELECT password from account WHERE account_name='" . $row4[3] . "'");
                                                    while ($rowp = mysqli_fetch_array($resultp)) {
                                                        $password = $rowp[0];
                                                    }
                                                ?>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0">ID</th>
                                                    <th class="border-0">Name</th>
                                                    <th class="border-0">Username</th>
                                                    <th class="border-0">Password</th>
                                                    <th class="border-0">Location</th>
                                                    <th class="border-0">Phone</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $row4[0]; ?></td>
                                                    <td><?php echo $row4[2]; ?> </td>
                                                    <td><?php echo $row4[3]; ?> </td>
                                                    <td><?php echo $password; ?></td>
                                                    <td><?php echo $row4[4]; ?></td>
                                                    <td><?php echo $row4[5]; ?></td>

                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="index.php?view" class="btn btn-block btn-primary">Back</a>
                                    <?php
                                                }
                                            }
                                            ?>

                                    <?php
                                            if (isset($_GET['notapproved'])) {
                                                echo "<h2>Orders not approved</h2>";
                                                echo "<br />";
                                            ?>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0">ID</th>
                                                    <th class="border-0">Name</th>
                                                    <th class="border-0">Date</th>
                                                    <th class="border-0">Username</th>
                                                    <th class="border-0">Approve</th>
                                                    <th class="border-0">Detail</th>
                                                </tr>
                                            </thead>
                                            <?php
                                                        $totalRecords = mysqli_query($connect, "SELECT * FROM orders where status = 'NOT'");

                                                        while ($row = mysqli_fetch_array($totalRecords)) {

                                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $row[0]; ?></td>
                                                    <td><?php echo $row[1]; ?> </td>
                                                    <td><?php echo $row[2]; ?> </td>
                                                    <td><?php echo $row[3]; ?></td>
                                                    <td><a href="index.php?action=yes&oid=<?php echo $row[0]; ?>"><i
                                                                class="fa fa-check"></i></a>
                                                    </td>
                                                    <td><a href="index.php?action=view2&oid=<?php echo $row[0]; ?>"><i
                                                                class="fas fa-fw fa-eye"></i></a>

                                                    </td>
                                                </tr>


                                            </tbody>
                                            <?php
                                                        }
                                                        ?>
                                        </table>
                                    </div>
                                    <?php
                                            }
                                            if (isset($_GET['action']) && $_GET['action'] == 'yes' && $_GET['oid']) {
                                                $orderid = $_GET['oid'];
                                                $queryy = mysqli_query($connect, "UPDATE orders set Status = 'YES' WHERE Order_Id = '" . $orderid . "'");
                                                $qU = mysqli_query($connect, "SELECT Username,Date from orders WHERE Order_Id = '" . $orderid . "'");
                                                $query = mysqli_query($connect, "SELECT * FROM ordersdetail WHERE Order_Id = '" . $orderid . "'");
                                                while ($rowy = mysqli_fetch_array($query)) {
                                                    $query2 = mysqli_query($connect, "SELECT * from product WHERE product_id='" . $rowy["Product_Id"] . "'");;
                                                    while ($rowyy = mysqli_fetch_array($query2)) {
                                                        $query3 = mysqli_query($connect, "SELECT * FROM ordersdetail WHERE Order_Id = '" . $orderid . "' and Product_Id = '" . $rowyy[0] . "'");
                                                        while ($rowyyy = mysqli_fetch_array($query3)) {
                                                            $queryyy = mysqli_query($connect, "Update product set `Number` = '" . $rowyy[9] . "' - '" . $rowyyy[3] . "' where product_Id = '" . $rowyyy[0] . "'");
                                                        }
                                                    }
                                                }
                                                while($rowU = mysqli_fetch_array($qU)){
                                                $qM = mysqli_query($connect,"SELECT sum(price) FROM `ordersdetail` WHERE Order_Id = '".$orderid."'");
                                                    while ($rowM = mysqli_fetch_array($qM)){
                                                    $qBill = mysqli_query($connect,"INSERT INTO `bill`(`Date`, `Username`, `Money`) VALUES ('".$rowU[1]."','".$rowU[0]."','".$rowM[0]."')");
                                                    $billid = mysqli_insert_id($connect);
                                                    $qB = mysqli_query($connect,"SELECT Product_Id,Price,Quantity from ordersdetail WHERE Order_Id = '".$orderid."'");
                                                    while($rowB = mysqli_fetch_array($qB)){
                                                    mysqli_query($connect, "INSERT INTO `billdetail`(`Product_Id`,`Bill_Id`, `Price`, `Quantity`) VALUES ('$rowB[0]',$billid,'$rowB[1]','$rowB[2]')");
                                                }
                                            }
                                            }
                                                echo "<script>window.location.href='index.php?notapproved';</script>";
                                            }
                                            if (isset($_GET['action']) && $_GET['action'] == 'view2' && $_GET['oid']) {
                                                $orderid = $_GET['oid'];
                                                $query = mysqli_query($connect, "SELECT * FROM ordersdetail WHERE Order_Id = '" . $orderid . "'");
                                                while ($row2 = mysqli_fetch_array($query)) {
                                                    $query2 = mysqli_query($connect, "SELECT * from product WHERE product_id='" . $row2["Product_Id"] . "'");;
                                                    while ($row3 = mysqli_fetch_array($query2)) {
                                                        $pname = $row3[1];
                                                        $image = $row3[8];
                                                ?>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0">Product Name</th>
                                                    <th class="border-0">Image</th>
                                                    <th class="border-0 text-center">Quantity</th>
                                                    <th class="border-0 text-right">Money</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <td><?php echo $pname ?></td>
                                                <td><img src="assets/images/product/<?php echo $image ?>"
                                                        style="width: 250px; height: 200px;" alt="img">
                                                </td>
                                                <th class="text-center"><?php echo $row2['Quantity'] ?></th>
                                                <th class="text-right"><?php echo $row2['Price'] ?></th>
                                            </tbody>
                                        </table>

                                    </div>

                                    <?php
                                                    }
                                                } ?>
                                    <a href="index.php?notapproved" class="btn btn-block btn-primary">Back</a>
                                    <?php
                                            }
                                            ?>


                                    <?php
                                            if (isset($_GET['approved'])) {
                                                echo "<h2>Orders approved</h2>";
                                                echo "<br />";
                                            ?>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0">ID</th>
                                                    <th class="border-0">Name</th>
                                                    <th class="border-0">Date</th>
                                                    <th class="border-0">Username</th>
                                                    <th class="border-0">Detail</th>
                                                </tr>
                                            </thead>
                                            <?php
                                                        $totalRecords = mysqli_query($connect, "SELECT * FROM orders where status = 'YES'");

                                                        while ($row = mysqli_fetch_array($totalRecords)) {

                                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $row[0]; ?></td>
                                                    <td><?php echo $row[1]; ?> </td>
                                                    <td><?php echo $row[2]; ?> </td>
                                                    <td><?php echo $row[3]; ?></td>
                                                    <td><a href="index.php?action=order&oid=<?php echo $row[0]; ?>"><i
                                                                class="fas fa-fw fa-eye"></i></a>

                                                    </td>

                                                </tr>


                                            </tbody>
                                            <?php
                                                        }
                                                        ?>
                                        </table>
                                    </div>
                                    <?php
                                            }
                                            if (isset($_GET['action']) && $_GET['action'] == 'order' && $_GET['oid']) {
                                                $orderid = $_GET['oid'];
                                                $query = mysqli_query($connect, "SELECT * FROM ordersdetail WHERE Order_Id = '" . $orderid . "'");
                                                while ($row2 = mysqli_fetch_array($query)) {
                                                    $query2 = mysqli_query($connect, "SELECT * from product WHERE product_id='" . $row2["Product_Id"] . "'");;
                                                    while ($row3 = mysqli_fetch_array($query2)) {
                                                        $pname = $row3[1];
                                                        $image = $row3[8];
                                                ?>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0">Product Name</th>
                                                    <th class="border-0">Image</th>
                                                    <th class="border-0 text-center">Quantity</th>
                                                    <th class="border-0 text-right">Money</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <td><?php echo $pname ?></td>
                                                <td><img src="assets/images/product/<?php echo $image ?>"
                                                        style="width: 250px; height: 200px;" alt="img">
                                                </td>
                                                <th class="text-center"><?php echo $row2['Quantity'] ?></th>
                                                <th class="text-right"><?php echo $row2['Price'] ?></th>
                                            </tbody>
                                        </table>

                                    </div>

                                    <?php
                                                    }
                                                } ?>
                                    <a href="index.php?approved" class="btn btn-block btn-primary">Back</a>
                                    <?php
                                            }
                                            ?>
                                    <?php
                                            if (isset($_GET['comment'])) {
                                                echo "<h2>Comments</h2>";
                                                echo "<br />";
                                            ?>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0">Product Name</th>
                                                    <th class="border-0">Image</th>
                                                    <th class="border-0">Comment Number</th>
                                                    <th class="border-0">Detail</th>
                                                </tr>
                                            </thead>
                                            <?php
                                                        $totalRecords = mysqli_query($connect, "SELECT Product_Id,Count(comment_id) FROM `comment` GROUP BY Product_Id");

                                                        while ($row = mysqli_fetch_array($totalRecords)) {
                                                            $resultc = mysqli_query($connect, "SELECT Product_Name,Image from product WHERE product_id='" . $row[0] . "'");;
                                                            while ($rowc = mysqli_fetch_array($resultc)) {
                                                                $name = $rowc[0];
                                                                $image = $rowc[1];
                                                            }
                                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $name; ?></td>
                                                    <td><img src="assets/images/product/<?php echo $image ?>"
                                                            style="width: 250px; height: 200px;" alt="img">
                                                    </td>
                                                    <td><?php echo $row[1]; ?> </td>
                                                    <td><a href="#"><i class="fas fa-fw fa-eye"></i></a>

                                                </tr>


                                            </tbody>
                                            <?php
                                                        }
                                                        ?>
                                        </table>
                                    </div>
                                    <?php
                                            } ?>


                                    <?php
                                            if (isset($_GET['blog'])) {
                                                echo "<h2>Blogs</h2>";
                                                echo "<br />";
                                            ?>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0">Blog Id</th>
                                                    <th class="border-0">Content</th>
                                                </tr>
                                            </thead>
                                            <?php
                                                        $totalRecords = mysqli_query($connect, "SELECT * FROM `blog`");

                                                        while ($row = mysqli_fetch_array($totalRecords)) {


                                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $row[0]; ?></td>
                                                    <td><?php echo $row[1]; ?> </td>
                                                </tr>


                                            </tbody>
                                            <?php
                                                        }
                                                        ?>
                                        </table>
                                    </div>
                                    <?php
                                            } ?>
                            </div>
                            <!-- <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Mango Dashboard </h2>
                            </div>
                        </div>
                    </div> -->
                            <div class="row">
                                <!-- ============================================================== -->

                                <!-- ============================================================== -->

                                <!-- recent orders  -->
                                <!-- ============================================================== -->
                                <!-- <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                                        <div class="card">
                                            <h5 class="card-header">Recent Orders</h5>
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead class="bg-light">
                                                            <tr class="border-0">
                                                                <th class="border-0">#</th>
                                                                <th class="border-0">Image</th>
                                                                <th class="border-0">Product Name</th>
                                                                <th class="border-0">Product Id</th>
                                                                <th class="border-0">Quantity</th>
                                                                <th class="border-0">Price</th>
                                                                <th class="border-0">Order Time</th>
                                                                <th class="border-0">Customer</th>
                                                                <th class="border-0">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>
                                                                    <div class="m-r-10"><img
                                                                            src="assets/images/product-pic.jpg"
                                                                            alt="user" class="rounded" width="45"></div>
                                                                </td>
                                                                <td>Product #1 </td>
                                                                <td>id000001 </td>
                                                                <td>20</td>
                                                                <td>$80.00</td>
                                                                <td>27-08-2018 01:22:12</td>
                                                                <td>Patricia J. King </td>
                                                                <td><span
                                                                        class="badge-dot badge-brand mr-1"></span>InTransit
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>
                                                                    <div class="m-r-10"><img
                                                                            src="assets/images/product-pic-2.jpg"
                                                                            alt="user" class="rounded" width="45"></div>
                                                                </td>
                                                                <td>Product #2 </td>
                                                                <td>id000002 </td>
                                                                <td>12</td>
                                                                <td>$180.00</td>
                                                                <td>25-08-2018 21:12:56</td>
                                                                <td>Rachel J. Wicker </td>
                                                                <td><span
                                                                        class="badge-dot badge-success mr-1"></span>Delivered
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>
                                                                    <div class="m-r-10"><img
                                                                            src="assets/images/product-pic-3.jpg"
                                                                            alt="user" class="rounded" width="45"></div>
                                                                </td>
                                                                <td>Product #3 </td>
                                                                <td>id000003 </td>
                                                                <td>23</td>
                                                                <td>$820.00</td>
                                                                <td>24-08-2018 14:12:77</td>
                                                                <td>Michael K. Ledford </td>
                                                                <td><span
                                                                        class="badge-dot badge-success mr-1"></span>Delivered
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>
                                                                    <div class="m-r-10"><img
                                                                            src="assets/images/product-pic-4.jpg"
                                                                            alt="user" class="rounded" width="45"></div>
                                                                </td>
                                                                <td>Product #4 </td>
                                                                <td>id000004 </td>
                                                                <td>34</td>
                                                                <td>$340.00</td>
                                                                <td>23-08-2018 09:12:35</td>
                                                                <td>Michael K. Ledford </td>
                                                                <td><span
                                                                        class="badge-dot badge-success mr-1"></span>Delivered
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="9"><a href="#"
                                                                        class="btn btn-outline-light float-right">View
                                                                        Details</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                <div class="row">
                                    <!-- ============================================================== -->
                                    <!-- total revenue  -->
                                    <!-- ============================================================== -->


                                    <!-- ============================================================== -->
                                    <!-- ============================================================== -->
                                    <!-- category revenue  -->
                                    <!-- ============================================================== -->
                                    <!-- <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Revenue by Category</h5>
                                    <div class="card-body">
                                        <div id="c3chart_category" style="height: 420px;"></div>
                                    </div>
                                </div>
                            </div> -->
                                    <!-- ============================================================== -->
                                    <!-- end category revenue  -->
                                    <!-- ============================================================== -->

                                    <!-- <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header"> Total Revenue</h5>
                                    <div class="card-body">
                                        <div id="morris_totalrevenue"></div>
                                    </div>
                                    <div class="card-footer">
                                        <p class="display-7 font-weight-bold"><span class="text-primary d-inline-block">$26,000</span><span class="text-success float-right">+9.45%</span></p>
                                    </div>
                                </div>
                            </div> -->
                                </div>

                            </div>

                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- end footer -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- end wrapper  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper  -->
        <!-- ============================================================== -->
        <!-- Optional JavaScript -->

        <!-- jquery 3.3.1 -->
        <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
        <!-- bootstap bundle js -->
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>