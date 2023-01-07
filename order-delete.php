<?php include 'connection.php' ?>
<?php
session_start();
if (isset($_SESSION["username"])) {
    $orderid = $_GET['oid'];

    $query1 = mysqli_query($connect, "DELETE FROM ordersdetail where Order_Id = '" . $orderid . "'");
    $query2 = mysqli_query($connect, "DELETE FROM orders where order_id = '" . $orderid . "'");
    if ($query1 && $query2)
        echo "<script>window.location.href='order.php';</script>";
}