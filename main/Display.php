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
    $redirectUrl = '../main/Display.php';
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

// Include necessary files
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
    <title>Main</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/scss/style.css">
</head>

<body>
    <div class="my-5" style="padding: 5%;">
        <form method="get" action="../main/Display.php" class="mb-4">
            <input type="hidden" name="category" value="<?php echo htmlspecialchars($selectedCategory); ?>">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search products..." value="<?php echo htmlspecialchars($searchQuery); ?>">
                <select name="sort" class="form-control ml-2">
                    <option value="">Sort by</option>
                    <option value="name" <?php if ($sortBy == 'name') echo 'selected'; ?>>Name</option>
                    <option value="price_asc" <?php if ($sortBy == 'price_asc') echo 'selected'; ?>>Price: Low to High</option>
                    <option value="price_desc" <?php if ($sortBy == 'price_desc') echo 'selected'; ?>>Price: High to Low</option>
                </select>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        <div class="p-5">
            <div class="container-fluid mb-1 mt-1">
                <div class="row">
                    <div class="card py-2 mb-4 col-md mx-2">
                        <a href="../main/Display.php?category=All" class="text-decoration-none">
                            <h2 class="card-header">All</h2>
                        </a>
                    </div>
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


        <div id="products">
            <?php displayCategoryProducts($inventory, $selectedCategory, $searchQuery, $sortBy); ?>
        </div>
    </div>

    <script>
        // Check if there's a scroll_to parameter in the URL
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
</body>

</html>