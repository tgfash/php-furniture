<?php
ob_start();
session_start();
?>

<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <h2>Mango Shop <em>Website</em></h2>
            </a>
            <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
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