<?php
require('../php/header.php');
require('../cart/cart_btn.php');
require('../php/footer.php');

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

require('../data/fetch_inventory.php');

$get_prid = isset($_GET['product']) ? $_GET['product'] : null;
$info = null;
if ($get_prid !== null) {
    foreach ($inventory as $category => $products) {
        foreach ($products as $product) {
            if ($get_prid == $product['id']) {
                $info = $product;
                break 2;
            }
        }
    }
}

if ($get_prid !== null && $info === null) {
    header('Location: index.php?error=No data for this product');
    exit;
}

if (isset($_GET['add_to_cart']) && isset($_GET['product'])) {
    $get_cart_product_id = $_GET['product'];
    $quantity = isset($_GET['quantity']) ? (int)$_GET['quantity'] : 1;

    if (!isset($_SESSION['cart'][$get_cart_product_id])) {
        $_SESSION['cart'][$get_cart_product_id] = $quantity;
    } else {
        $_SESSION['cart'][$get_cart_product_id] += $quantity;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <!-- Link to the compiled CSS file -->
    <link rel="stylesheet" href="/scss/style.css">

    <style>


    </style>
</head>

<body class="">




</body>

</html>