<?php
session_start();
ob_start(); // Start output buffering

require('../php/header.php');
require('../php/footer.php');
require('../data/fetch_inventory.php');
require('../cart/cart_btn.php');

// Handle adding product to the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['product_id'])) {
        $product_id = intval($_POST['product_id']);
        $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Add or update the item in the cart
        $_SESSION['cart'][$product_id] = isset($_SESSION['cart'][$product_id])
            ? $_SESSION['cart'][$product_id] + $quantity
            : $quantity;

        //Go back to product page with it's id
        header('Location: ../main/product.php?product=' . $product_id);

        ob_end_flush(); // End buffering and flush output
        exit();
    }
}

// Fetch the product ID and validate it
$product_id = intval($_GET['product']);
$product = null;

// Find the product in the inventory
foreach ($inventory as $category => $products) {
    foreach ($products as $prod) {
        if ($prod['id'] == $product_id) {
            $product = $prod;
            break 2;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details | Artisté</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/scss/style.css">
</head>

<body>

    <?php include('../php/header.php'); ?>

    <div class="product-container my-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../main/Home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="../main/Display.php?category=<?php echo urlencode($product['category']); ?>"><?php echo htmlspecialchars($product['category']); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($product['name']); ?></li>
            </ol>
        </nav>

        <div class="product-card row">
            <div class="col-md-6">
                <img src="<?php echo htmlspecialchars($product['img']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image img-fluid">
            </div>
            <div class="col-md-6">
                <h1 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h1>
                <strong>
                    <h5 class="product-ocassion"><?php echo htmlspecialchars($product['occasion']); ?></h5>
                </strong>
                <strong>
                    <p class="product-description"><?php echo htmlspecialchars($product['description']); ?></p>
                </strong>

                <p class="product-long_description"><?php echo htmlspecialchars($product['long_description']); ?></p>

                <p class="product-price"><?php echo number_format($product['price'], 2); ?> AED</p>
                <form action="product.php" method="post">
                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="quantity" value="1" min="1" aria-label="Quantity">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include('../php/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>