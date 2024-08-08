
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cart'])) {
    $itemId = $_POST['product_id'];
    $quantity = (int)$_POST['quantity'];

    // Update cart item quantity
    if ($quantity > 0) {
        $_SESSION['cart'][$itemId]['quantity'] = $quantity;
    } else {
        // Remove item from cart if quantity is 0 or less
        unset($_SESSION['cart'][$itemId]);
    }

    // Redirect back to view_cart.php
    header('Location: view_cart.php');
    exit();
}
?>
