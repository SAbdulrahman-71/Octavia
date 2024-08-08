<?php
include('../php/header.php');
include('../cart/cart_btn.php');
include('../php/footer.php');

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pannel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/scss/style.css">
</head>

<body class="card py-5 px-5">
    <div class="card-header bg-success"><?php echo $_SESSION['name']; ?></div>
    <div class="card-body">
        <h1>welcome to manger pannel Dear <?php echo  $_SESSION['role'] . ' '  . $_SESSION['name'] . '!' ?> </h1>
    </div>
</body>

</html>