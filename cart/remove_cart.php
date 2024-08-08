<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_from_cart'])) {
    $itemId = $_POST['product_id'];

    // Remove item from cart
    unset($_SESSION['cart'][$itemId]);

    // Redirect back to view_cart.php
    header('Location: view_cart.php');
    exit();
}
