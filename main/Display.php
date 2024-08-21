<?php
session_start();

// Check if user is logged in; if not, redirect to login
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../auth/login.php');
    exit;
}

// Initialize cart if not already
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle adding product to the cart
if (isset($_GET['product'])) {
    $product_id = intval($_GET['product']);
    $quantity = isset($_GET['quantity']) ? intval($_GET['quantity']) : 1;

    // Add or update the item in the cart
    $_SESSION['cart'][$product_id] = isset($_SESSION['cart'][$product_id])
        ? $_SESSION['cart'][$product_id] + $quantity
        : $quantity;

    // Redirect to the same page with a fragment identifier to scroll to the product
    $redirectUrl = 'display.php';
    if (isset($_GET['scroll_to'])) {
        $redirectUrl .= '?scroll_to=' . intval($_GET['scroll_to']);
    }
    header('Location: ' . $redirectUrl);
    exit();
}

// Capture category for session storage
if (isset($_GET['category'])) {
    $_SESSION['category'] = $_GET['category'];
}

$selectedCategory = isset($_SESSION['category']) ? $_SESSION['category'] : 'All';

// Capture search query and sorting
$searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';
$sortBy = isset($_GET['sort']) ? $_GET['sort'] : '';
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

require('../data/fetch_inventory.php');
require('../php/header.php');
require('../cart/cart_btn.php');
require('../php/footer.php');
require('../php/search_sort.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>|Product Display</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/scss/style.css">
    <style>

    </style>
</head>

<body class="display_body">
    <?php include('../php/header.php'); ?>

    <div class="container my-5">
        <!-- Search and Filter Form -->
        <form method="get" action="display.php" class="mb-4">
            <input type="hidden" name="category" value="<?php echo htmlspecialchars($selectedCategory); ?>">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search products..." value="<?php echo htmlspecialchars($searchQuery); ?>">
                <select name="sort" class="form-control ml-2">
                    <option value="">Sort by</option>
                    <option value="name" <?php echo $sortBy === 'name' ? 'selected' : ''; ?>>Name</option>
                    <option value="price_asc" <?php echo $sortBy === 'price_asc' ? 'selected' : ''; ?>>Price: Low to High</option>
                    <option value="price_desc" <?php echo $sortBy === 'price_desc' ? 'selected' : ''; ?>>Price: High to Low</option>
                </select>
                <div class="input-group-append">
                    <button type="submit">Search</button>
                </div>
            </div>
        </form>

        <!-- Category Buttons -->
        <div class="category-btn mb-4">
            <a href="display.php?category=All">All</a>
            <?php foreach ($inventory as $categoryName => $products) : ?>
                <a href="display.php?category=<?php echo urlencode($categoryName); ?>" class=""><?php echo htmlspecialchars($categoryName); ?></a>
            <?php endforeach; ?>
        </div>

        <!-- Product Display -->
        <div id="products" class="row">
            <?php displayCategoryProducts($inventory, $selectedCategory, $searchQuery, $sortBy, $page); ?>
        </div>

        <!-- Pagination -->
        <?php
        $totalItems = getTotalItemsCount($selectedCategory, $searchQuery);
        $limit = 20; // Number of items per page
        $totalPages = ceil($totalItems / $limit);

        if ($totalPages > 1) {
            echo '<nav aria-label="Page navigation">';
            echo '<ul class="pagination justify-content-center">';
            for ($i = 1; $i <= $totalPages; $i++) {
                $active = $i == $page ? 'active' : '';
                echo "<li class='page-item $active'><a class='page-link' href='display.php?page=$i&search=" . urlencode($searchQuery) . "&sort=" . urlencode($sortBy) . "&category=" . urlencode($selectedCategory) . "'>$i</a></li>";
            }
            echo '</ul>';
            echo '</nav>';
        }
        ?>

    </div>

    <?php include('../php/footer.php'); ?>

    <script>
        // Smooth scroll to product
        const urlParams = new URLSearchParams(window.location.search);
        const scrollToId = urlParams.get('scroll_to');
        if (scrollToId) {
            const element = document.getElementById(`product-${scrollToId}`);
            if (element) {
                element.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
    </script>

    <script src="../js/like.js"></script>
</body>

</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.wish-icon').forEach(function(icon) {
            icon.addEventListener('click', function() {
                var productId = this.getAttribute('data-product-id');
                var isWishlist = this.classList.contains('fa-heart');

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'wishlist_action.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        if (isWishlist) {
                            icon.classList.remove('fa-heart');
                            icon.classList.add('fa-heart-o');
                        } else {
                            icon.classList.remove('fa-heart-o');
                            icon.classList.add('fa-heart');
                        }
                    }
                };
                xhr.send('product_id=' + productId + '&action=' + (isWishlist ? 'remove' : 'add'));
            });
        });
    });
</script>