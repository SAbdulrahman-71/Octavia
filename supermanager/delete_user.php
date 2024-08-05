<?php
// Include database connection
include '../php/db.php';  // Assuming your connection script is named db_connect.php

// Get user ID from POST request
$user_id = intval($_POST['user_id']);

// Delete user from the database
$query = "DELETE FROM users WHERE id = $user_id";
if (mysqli_query($connect, $query)) {
    echo 'User deleted successfully.';
} else {
    echo 'Error deleting user: ' . mysqli_error($connect);
}

// Redirect back to the user management page
header('Location: index.php');
exit;
