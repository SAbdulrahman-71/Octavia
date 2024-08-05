<?php
session_start();


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manger pannel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="card py-5 px-5">
    <div class="card-header bg-warning"><?php echo $_SESSION['name']; ?></div>
    <div class="card-body">
        <h1>welcome to manger pannel Dear <?php echo  $_SESSION['role'] . ' '  . $_SESSION['name'] . '!' ?> </h1>
    </div>
</body>

</html>