<?php include 'connection.php' ?>
<?php
session_start();
if (isset($_SESSION["username"])) {
    $pid = $_GET['pid'];
    $cid = $_GET['cid'];

    $query = mysqli_query($connect, "DELETE FROM wishlist where Product_Id ='" . $pid . "' and Customer_Id='" . $cid . "'");
    if ($query)
        echo "<script>window.location.href='wishlist.php';</script>";
}