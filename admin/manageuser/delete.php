<?php include 'connection.php' ?>
<?php
$id = $_GET['id'];
$sql1 = "DELETE FROM customer WHERE account_id =$id";
mysqli_query($connect, $sql1);
$sql2 = "DELETE FROM comment WHERE customer_id =$id";
mysqli_query($connect, $sql2);

$sql = "DELETE FROM account WHERE account_id =$id";
mysqli_query($connect, $sql);

echo "<script>window.location.href='../index.php?users';</script>";