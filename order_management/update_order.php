
<?php
// Include database connection
include '../php/db.php';

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in and has a role
if (!isset($_SESSION['role'])) {
    // Redirect to login page if no role is set
    header('Location: ../auth/login.php');
    exit;
}

// Escape and validate input
$order_number = mysqli_real_escape_string($connect, $_POST['order_number']);
$new_order_status = mysqli_real_escape_string($connect, $_POST['new_order_status']); // Fixed typo in 'new_order_status'

// Update order status in the database
$query = "UPDATE orders SET status = '$new_order_status' WHERE order_number = '$order_number'"; // Correct WHERE clause
if (mysqli_query($connect, $query)) {
    $message = 'Order status updated successfully.';
} else {
    $message = 'Error updating order status: ' . mysqli_error($connect);
}

// Determine the redirect location based on user role
switch ($_SESSION['role']) {
    case 'super_manager':
        $redirect_url = '../supermanager/S_index.php';
        break;
    case 'manager':
        $redirect_url = '../manager/M_index.php';
        break;
    case 'admin':
        $redirect_url = '../admin/A_index.php';
        break;
    default:
        // If role is not recognized, redirect to a default page or an error page
        $redirect_url = '../auth/login.php'; // Redirect to login or error page
        break;
}

// Redirect back to management page with success or error message
header('Location: ' . $redirect_url . '?message=' . urlencode($message));
exit;
?>