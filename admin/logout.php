<?php
session_start();
unset($_SESSION["adminun"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log out</title>
</head>

<body>
    <?php
    echo "<script>window.location.href='login.php';</script>";
    $_SESSION['Logout'] = "Successful";
    ?>
</body>

</html>