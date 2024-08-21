<?php
include '../php/db.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['role'])) {
    header('Location: ../auth/login.php');
    exit;
}

// Escape and validate input
$order_number = mysqli_real_escape_string($connect, $_POST['order_number']);
$new_order_status = mysqli_real_escape_string($connect, $_POST['new_order_status']);

// Update order status in the database
$query = "UPDATE orders SET status = '$new_order_status' WHERE order_number = '$order_number'";
if (mysqli_query($connect, $query)) {
    // Fetch user ID associated with the order
    $user_query = "SELECT user_id FROM orders WHERE order_number = '$order_number'";
    $user_result = mysqli_query($connect, $user_query);
    if ($user_result && $user_row = mysqli_fetch_assoc($user_result)) {
        $user_id = $user_row['user_id'];

        // Create notification message
        $message = "Your order #$order_number has been updated to $new_order_status.";

        // Add notification to the database
        $stmt = $connect->prepare("INSERT INTO notifications (user_id, message) VALUES (?, ?)");
        $stmt->bind_param("is", $user_id, $message);
        $stmt->execute();
    }

    $message = 'Order status updated successfully.';
} else {
    $message = 'Error updating order status: ' . mysqli_error($connect);
}


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

        $redirect_url = '../auth/login.php';
        break;
}

// Redirect back to management page with success or error message
header('Location: ' . $redirect_url . '?message=' . urlencode($message));
exit;
