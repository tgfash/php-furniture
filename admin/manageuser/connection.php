<?php
$connect = mysqli_connect('localhost', 'root', '123', 'mango');
mysqli_set_charset($connect, "utf8");
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}