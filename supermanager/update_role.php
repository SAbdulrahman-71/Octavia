<?php
// Include database connection
include '../php/db.php'; // Assuming your connection script is named db_connect.php

// Get user ID and new role from POST request
$user_id = intval($_POST['user_id']);
$new_role = mysqli_real_escape_string($connect, $_POST['new_role']);

// Update user role in the database
$query = "UPDATE users SET role = '$new_role' WHERE id = $user_id";
if (mysqli_query($connect, $query)) {
    echo 'User role updated successfully.';
} else {
    echo 'Error updating role: ' . mysqli_error($connect);
}

// Redirect back to the user management page
header('Location: index.php');
exit;
