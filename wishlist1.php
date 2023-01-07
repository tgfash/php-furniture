<?php include 'connection.php' ?>
<?php
session_start();

if (isset($_SESSION["username"])) {
    $username = $_SESSION['username'];
    $query = mysqli_query($connect, "SELECT Customer_Id from customer WHERE username='" . $username . "'");;
    while ($row = mysqli_fetch_array($query)) {
        $Customerid = $row[0];
    }
    $Productid = $_GET['id'];
    $query2 = mysqli_query($connect, "SELECT image from product WHERE product_id='" . $Productid . "'");;
    while ($row2 = mysqli_fetch_array($query2)) {
        $image = $row2[0];
    }
    $check = mysqli_query($connect, "SELECT * FROM wishlist where Product_Id = '" . $Productid . "' and Customer_Id = '" . $Customerid . "'");
    if (mysqli_num_rows($check) == 1) {
        echo "<script>window.location.href='products.php';</script>";
        $_SESSION['NotAddWL'] = 'UnSuccessful';
    } else {
        $execute = mysqli_query($connect, "INSERT INTO `wishlist`(`Product_Id`, `Customer_Id`,`Image`) VALUES ('" . $Productid . "','" . $Customerid . "','" . $image . "')");
        echo "<script>window.location.href='products.php';</script>";
        $_SESSION['AddWL'] = 'Successful';
    }
}