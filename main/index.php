<?php
session_start();
require('../php/header.php');
require('../cart/cart_btn.php');


if (!isset($_SESSION['loggedin'])) {
    header('Location: ../auth/login.php');
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
    header('Location: ../main/index.php?error=No data for this product');
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <style>
        /* Custom styles for the product cards */
        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .card-title {
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
        }

        .card-footer .input-group input {
            background-color: whitesmoke
        }
    </style>

    <div class="my-5 p-5">
        <div class="container mb-1 mt-1" style="margin-left: 25%;">
            <div class="row">
                <?php foreach ($inventory as $categoryName => $products) : ?>
                    <div class="card py-2 mb-4 col-md-4 mx-2">
                        <a href="../main/Display.php?category=<?php echo urlencode($categoryName); ?>" class="text-decoration-none">
                            <h2 class="card-header"><?php echo htmlspecialchars($categoryName); ?></h2>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>


    <?php require('../php/footer.php'); ?>
</body>

</html>