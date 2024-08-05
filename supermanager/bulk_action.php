<?php
// Include database connection
include '../php/db.php';  // Adjust the path as needed

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get selected items
    $items = isset($_POST['items']) ? $_POST['items'] : [];
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    if (!empty($items)) {
        // Convert array to comma-separated list
        $item_ids = implode(',', array_map('intval', $items));

        if ($action === 'delete') {
            $query = "DELETE FROM inventory WHERE id IN ($item_ids)";
            if (mysqli_query($connect, $query)) {
                $message = 'Selected products deleted successfully';
            } else {
                $message = 'Error deleting products: ' . mysqli_error($connect);
            }
        } elseif ($action === 'edit') {
            // Redirect to edit page with selected item IDs (example, customize as needed)
            header('Location: edit_inventory.php?items=' . urlencode($item_ids));
            exit;
        } else {
            $message = 'Invalid action selected';
        }
    } else {
        $message = 'No items selected';
    }

    // Redirect to index with message
    header("Location: index.php?message=" . urlencode($message));
    exit;
}
