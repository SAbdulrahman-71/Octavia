<?php
// Include database connection
include '../php/db.php';  // Adjust the path as needed

// Get item ID from POST request
$item_id = intval($_POST['item_id']);

// Initialize message variable
$mess = '';

// Delete item from the database
$query = "DELETE FROM inventory WHERE id = $item_id";
if (mysqli_query($connect, $query)) {
    $mess = 'Product deleted successfully';
    header("Location: index.php?message=" . urlencode($mess));
    exit;
} else {
    $mess = 'Error deleting product: ' . mysqli_error($connect);
    header("Location: index.php?message=" . urlencode($mess));
    exit;
}
