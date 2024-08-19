<?php
require('../php/header.php');
require('../cart/cart_btn.php');


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

// Query to get featured products
$F_query = "
    SELECT 
        i.id, 
        i.name, 
        i.description,
        i.img,
        p.is_featured
    FROM 
        inventory i
    JOIN 
        inventory_promotion p ON i.id = p.inventory_id
    WHERE 
        p.is_featured = 1
";

// Query to get promotional products
$P_query = "
    SELECT 
        i.id, 
        i.name, 
        i.description,
        i.img,
        p.promotion_type
    FROM 
        inventory i
    JOIN 
        inventory_promotion p ON i.id = p.inventory_id
    WHERE 
        p.promotion_type IS NOT NULL
";

// Fetch the featured products
$result = mysqli_query($connect, $F_query);
if (!$result) {
    die('Query failed: ' . mysqli_error($connect));
}
$featuredProducts = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Fetch the promotional products
$result = mysqli_query($connect, $P_query);
if (!$result) {
    die('Query failed: ' . mysqli_error($connect));
}
$Promo_Products = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Artisté</title>
    <link rel="stylesheet" href="./scss/style.css">
</head>

<body class="home" style="background-color: #e2e2e2;">

    <div class="hero">

        <div class="welcome">
            <h1>Welcome to Artisté</h1>
            <p>Your destination for exquisite flowers, perfumes, gifts, chocolates, and watches.</p>
            <button>
                <a href="display.php?category=All" class="btn btn-lg">Shop Now</a>
            </button>
        </div>
    </div>

    <div class="featured-container">
        <h2>Featured Products</h2>
        <div class="row">
            <?php foreach ($featuredProducts as $product): ?>
                <div class="col-md-3 mb-4">
                    <div class="card product-card h-100">
                        <img src="<?php echo htmlspecialchars($product['img']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="card-img-top img-fluid" loading="lazy">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($product['description']); ?></p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="display.php?product=<?php echo htmlspecialchars($product['id']); ?>" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="explore-container">
        <div class="product-heading-container">
            <h2 class="product-heading">Explore Our Wide Range of Products!</h2>
        </div>
        <div class="category-btn mb-4">
            <div class="row">
                <?php foreach ($inventory as $categoryName => $products) : ?>
                    <div class="col-md-4 mb-4">
                        <div class="promotion-card">
                            <div class="card">
                                <div class="promotion-info text-center py-3">
                                    <p>Check out the latest additions to our collection.</p>
                                    <a href="display.php?category=<?php echo urlencode($categoryName); ?>" class="btn btn-info"><?php echo htmlspecialchars($categoryName); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="promotion-container my-5">
        <h2>On Promotion</h2>
        <div class="row">
            <?php foreach ($Promo_Products as $product): ?>
                <div class="col-md-2 mb-4">
                    <div class="card product-card h-100">

                        <img src="<?php echo htmlspecialchars($product['img']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="card-img-top img-fluid" loading="lazy">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>

                        </div>
                        <div class="card-footer text-center">
                            <a href="display.php?product=<?php echo htmlspecialchars($product['id']); ?>" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Category Buttons -->
    <div class="category-btn mb-4 py-5">
        <a href="display.php?category=All" class="btn btn-secondary">All</a>
        <?php foreach ($inventory as $categoryName => $products) : ?>
            <a href="display.php?category=<?php echo urlencode($categoryName); ?>" class="btn btn-secondary"><?php echo htmlspecialchars($categoryName); ?></a>
        <?php endforeach; ?>
    </div>


    <?php require('../php/footer.php'); ?>
</body>

</html>