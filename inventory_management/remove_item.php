<?php
// Start a session
session_start();

// Get the index of the item to remove
$itemIndex = isset($_GET['index']) ? intval($_GET['index']) : null;

if ($itemIndex && isset($_SESSION['number_of_items'])) {
    // Get the number of items
    $numberOfItems = $_SESSION['number_of_items'];

    // If the index is valid, adjust the count
    if ($itemIndex <= $numberOfItems) {
        // Rebuild the number of items to include all but the removed one
        $newNumberOfItems = $numberOfItems - 1;

        // Create a new list of indexes excluding the removed item
        $newItemIndexes = [];
        for ($i = 1; $i <= $numberOfItems; $i++) {
            if ($i !== $itemIndex) {
                $newItemIndexes[] = $i;
            }
        }

        // Update the session data
        $_SESSION['number_of_items'] = $newNumberOfItems;
        $_SESSION['item_indexes'] = $newItemIndexes;
    }
}

// Redirect back to the form page
header('Location: add_multiple_inventory.php');
exit;
