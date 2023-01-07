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
    <title>Home</title>
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
                <a class="navbar-brand" href="first.php">
                    <h2>Mango Shop <em>Website</em></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="first.php">Home
                            </a>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="login.php">Products</a></li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="true" aria-expanded="false">More</a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="login.php">About Us</a>
                                <a class="dropdown-item" href="login.php"">Blog</a>
                                <a class=" dropdown-item" href="login.php">Testimonials</a>
                                <a class="dropdown-item" href="login.php">Terms</a>
                            </div>
                        </li>


                        <li class="nav-item"><a class="nav-link" href="login.php">Contact Us</a></li>

                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
        <div class="owl-banner owl-carousel">
            <div class="banner-item-01">
                <div class="text-content">
                    <h4>Find your car today!</h4>
                    <h2>Lorem ipsum dolor sit amet</h2>
                </div>
            </div>
            <div class="banner-item-02">
                <div class="text-content">
                    <h4>Fugiat Aspernatur</h4>
                    <h2>Laboriosam reprehenderit ducimus</h2>
                </div>
            </div>
            <div class="banner-item-03">
                <div class="text-content">
                    <h4>Saepe Omnis</h4>
                    <h2>Quaerat suscipit unde minus dicta</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Featured Products</h2>
                        <a href="login.php">view more <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="login.php"><img src="assets/images/product-1-370x270.jpg" alt=""></a>
                        <div class="down-content">
                            <a href="login.php">
                                <h4>Lorem ipsum dolor sit amet.</h4>
                            </a>
                            <h6><small><del>$999.00 </del></small> $779.00</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum dicta voluptas quia dolor
                                fuga odit.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="product-item">
                        <a href="login.php"><img src="assets/images/product-2-370x270.jpg" alt=""></a>
                        <div class="down-content">
                            <a href="login.php">
                                <h4>Lorem ipsum dolor sit amet.</h4>
                            </a>
                            <h6><small><del>$99.00</del></small> $79.00</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non beatae soluta, placeat
                                vitae cum maxime culpa itaque minima.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="product-item">
                        <a href="login.php"><img src="assets/images/product-3-370x270.jpg" alt=""></a>
                        <div class="down-content">
                            <a href="login.php">
                                <h4>Lorem ipsum dolor sit amet.</h4>
                            </a>
                            <h6><small><del>$1999.00</del></small> $1779.00</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt nisi quia aspernatur,
                                harum facere delectus saepe enim?</p>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>

    <div class="best-features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>About Us</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="left-content">
                        <p>Lorem ipsum dolor sit amet, <a href="#">consectetur</a> adipisicing elit. Explicabo, esse
                            consequatur alias repellat in excepturi inventore ad <a href="#">asperiores</a> tempora
                            ipsa. Accusantium tenetur voluptate labore aperiam molestiae rerum excepturi minus in
                            pariatur praesentium, corporis, aliquid dicta.</p>
                        <ul class="featured-list">
                            <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                            <li><a href="#">Consectetur an adipisicing elit</a></li>
                            <li><a href="#">It aquecorporis nulla aspernatur</a></li>
                            <li><a href="#">Corporis, omnis doloremque</a></li>
                        </ul>
                        <a href="login.php" class="filled-button">Read More</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-image">
                        <img src="assets/images/about-1-570x350.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="services" style="background-image: url(assets/images/other-image-fullscren-1-1920x900.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Latest blog posts</h2>

                        <a href="login.php">read more <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-item">
                        <a href="#" class="services-item-image"><img src="assets/images/blog-1-370x270.jpg"
                                class="img-fluid" alt=""></a>

                        <div class="down-content">
                            <h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit hic</a></h4>

                            <p style="margin: 0;"> John Doe &nbsp;&nbsp;|&nbsp;&nbsp; 12/06/2020 10:30
                                &nbsp;&nbsp;|&nbsp;&nbsp; 114</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="happy-clients">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Happy Clients</h2>

                        <a href="login.php">read more <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <div class="row">
                            <div class="col-md-8">
                                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing.</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite
                                    author nulla.</p>
                            </div>
                            <div class="col-lg-4 col-md-6 text-right">
                                <a href="login.php" class="filled-button">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <p>Copyright © 2022 Company Mango</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php
    if (isset($_SESSION['Logout'])) { ?>
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
    toastr["success"]("Logout Successfully!", "Success")


    <?php }
        unset($_SESSION['Logout'])
            ?>
    </script>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
</body>

</html>