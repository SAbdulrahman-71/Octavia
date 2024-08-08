<?php
// session_start();
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

    <div class="my-5" style="padding: 5%;">

        <?php
        // Set the chosen category to the session variable
        if (isset($_GET['category'])) {
            $_SESSION['category'] = $_GET['category'];
        }

        // Retrieve the selected category from the session
        $selectedCategory = isset($_SESSION['category']) ? $_SESSION['category'] : null;

        // Function to display products for the selected category
        function displayCategoryProducts($inventory, $selectedCategory)
        {
            if ($selectedCategory && isset($inventory[$selectedCategory])) {
                $products = $inventory[$selectedCategory];
                echo '<div class="container-fluid mb-1 mt-1">';
                echo '<div class="row">';
                foreach ($products as $product) {
                    echo '<div class="col-md-3 mb-4">';
                    echo '<div class="card h-100 shadow-sm bg-light">';
                    echo '<div class="card-header text-center">';
                    echo '<img src="' . htmlspecialchars($product['img']) . '" alt="' . htmlspecialchars($product['name']) . '" class="img-fluid">';
                    echo '</div>';
                    echo '<div class="card-body text-center">';
                    echo '<h5 class="card-title font-weight-bold">' . htmlspecialchars($product['name']) . '</h5>';
                    echo '<p class="card-text"><strong>Price:</strong> ' . number_format($product['price'], 2) . ' AED</p>';
                    echo '<p class="card-text"><strong>Occasion:</strong> ' . htmlspecialchars($product['occasion']) . '</p>';
                    echo '</div>';
                    echo '<div class="card-footer">';
                    echo '<form action="../main/index.php" method="get" class="mt-auto">';
                    echo '<input type="hidden" name="product" value="' . htmlspecialchars($product['id']) . '">';
                    echo '<div class="input-group">';
                    echo '<input type="number" class="form-control" name="quantity" value="1" min="1">';
                    echo '<div class="input-group-append">';
                    echo '<button type="submit" class="btn btn-primary" name="add_to_cart" value="1">Add to Cart</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
                echo '</div>';
            } else {
                echo '<p>No products found for the selected category.</p>';
            }
        }






        // Display the products for the selected category
        // displayCategoryProducts($inventory, $selectedCategory);
        ?>

        <div class="p-5">
            <div class="container-fluid mb-1 mt-1">
                <div class="row">
                    <?php foreach ($inventory as $categoryName => $products) : ?>
                        <div class="card py-2 mb-4 col-md mx-2">
                            <a href="../main/Display.php?category=<?php echo urlencode($categoryName); ?>" class="text-decoration-none">
                                <h2 class="card-header"><?php echo htmlspecialchars($categoryName); ?></h2>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>


        <?php displayCategoryProducts($inventory, $selectedCategory); ?>





</body>


</html><?php require('../php/footer.php'); ?>