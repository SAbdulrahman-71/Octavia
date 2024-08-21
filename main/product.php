<?php
session_start();
require('../php/header.php'); // Include header
require('../php/footer.php'); // Include footer
require('../data/fetch_inventory.php'); // Fetch inventory data

// Check if a product ID is provided
if (!isset($_GET['product'])) {
    header('Location: index.php?error=Product not found');
    exit;
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

if ($product === null) {
    header('Location: index.php?error=Product not found');
    exit;
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
    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .breadcrumb {
            background-color: transparent;
            padding: 0;
        }

        .product-card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            padding: 20px;
            margin-bottom: 30px;
            overflow: hidden;
        }

        .product-image {
            border-radius: 15px;
            max-height: 500px;
            object-fit: cover;
            width: 100%;
            margin-bottom: 20px;
        }

        .product-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .product-price {
            color: #e74c3c;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .product-description {
            margin-bottom: 30px;
            font-size: 1rem;
            line-height: 1.6;
        }

        .btn-add-to-cart {
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 1.2rem;
            transition: background-color 0.3s ease;
        }

        .btn-add-to-cart:hover {
            background-color: #2980b9;
        }

        .input-group input {
            border-radius: 5px 0 0 5px;
        }

        .input-group-append .btn {
            border-radius: 0 5px 5px 0;
        }
    </style>
</head>

<body>

    <?php include('../php/header.php'); ?>

    <div class="container my-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="category.php?category=<?php echo urlencode($product['category']); ?>"><?php echo htmlspecialchars($product['category']); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($product['name']); ?></li>
            </ol>
        </nav>

        <div class="product-card row">
            <div class="col-md-6">
                <img src="<?php echo htmlspecialchars($product['img']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image img-fluid">
            </div>
            <div class="col-md-6">
                <h1 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h1>
                <p class="product-price"><?php echo number_format($product['price'], 2); ?> AED</p>
                <p class="product-description"><?php echo htmlspecialchars($product['description']); ?></p>

                <form action="../cart/cart_btn.php" method="post">
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