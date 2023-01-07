<?php include 'connection.php' ?>
<?php
session_start();
if (isset($_SESSION["username"])) {
    $pid = $_GET['pid'];
    if (isset($_SESSION["cart"])) {
        $cart = $_SESSION["cart"];
        unset($cart[$pid]);
    }
    $_SESSION["cart"] = $cart;
    echo "<script>window.location.href='checkout.php';</script>";
}