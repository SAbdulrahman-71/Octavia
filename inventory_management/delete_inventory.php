<?php
include '../php/db.php'; // Ensure this includes your database connection

$id = intval($_GET['id']);

$delete_query = "DELETE FROM inventory WHERE id = $id";
if (mysqli_query($connect, $delete_query)) {
    // Also delete the promotion if necessary
    $delete_promotion_query = "DELETE FROM inventory_promotion WHERE inventory_id = $id";
    mysqli_query($connect, $delete_promotion_query);
    header('Location: ../supermanager/S_index.php');
    exit();
} else {
    die('Delete failed: ' . mysqli_error($connect));
}
