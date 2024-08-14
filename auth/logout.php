<?php
session_start();

require('../php/db.php');

// Check if the user is logged in
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Sanitize email to prevent SQL injection
    $email = mysqli_real_escape_string($connect, $email);

    // Update the 'is_loggedin' status
    $logout_query = "UPDATE users SET is_loggedin = 0 WHERE email = '$email'";

    if (mysqli_query($connect, $logout_query)) {

        $_SESSION['logout_message'] = 'User logged out successfully.';
    } else {

        error_log('Error updating status: ' . mysqli_error($connect));
        $_SESSION['logout_message'] = 'Error updating status. Please try again.';
    }
} else {
    $_SESSION['logout_message'] = 'No user is currently logged in.';
}

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page
header('Location: ../main/index.php');
exit;
