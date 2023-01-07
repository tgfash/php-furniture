<?php include 'connection.php' ?>
<?php
$id = $_GET['id'];
$sql = "DELETE FROM product WHERE product_id =$id";
mysqli_query($connect, $sql);
$sql1 = "DELETE FROM wishlist WHERE product_id =$id";
mysqli_query($connect, $sql1);
$sql2 = "DELETE FROM ordersdetail WHERE product_id =$id";
mysqli_query($connect, $sql2);
$sql3 = "DELETE FROM comment WHERE product_id =$id";
mysqli_query($connect, $sql3);
echo "<script>window.location.href='index.php?delete';</script>";