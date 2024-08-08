<?php
// Start the session
session_start();

// Check if the user is logged in and has the correct role
if (!isset($_SESSION['loggedin']) || ($_SESSION['role'] != 'manager' && $_SESSION['role'] != 'admin')) {
    header('Location: ../auth/login.php');
    exit;
}

// Include header, cart button, and footer
require('../php/header.php');
require('../cart/cart_btn.php');
require('../php/footer.php');

// Database connection
require('../php/db.php');

// Update order status if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $order_id = intval($_POST['order_id']);
    $status = htmlspecialchars($_POST['status']);

    $update_status = $connect->prepare("UPDATE orders SET status = ? WHERE id = ?");
    if ($update_status) {
        $update_status->bind_param('si', $status, $order_id);
        if ($update_status->execute()) {
            header('Location: M_index.php'); // Redirect to the same page to refresh orders list
            exit();
        } else {
            echo 'Error: ' . $update_status->error;
        }
    } else {
        echo 'Failed to prepare statement.';
    }
}

// Fetch all orders
$orders_result = $connect->query("SELECT * FROM orders");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../scss/style.css">
</head>

<body class="container">
    <div class="card py-5 px-5">
        <div class="card-header bg-warning"><?php echo htmlspecialchars($_SESSION['name']); ?></div>
        <div class="card-body">
            <h1>Welcome to the Manager Panel, Dear <?php echo htmlspecialchars($_SESSION['role']) . ' ' . htmlspecialchars($_SESSION['name']) . '!'; ?></h1>
        </div>
    </div>

    <div style="margin-top: 10%; margin-bottom:10%">
        <div class="container">
            <h2 class="mb-4">Manage Orders</h2>
            <?php if ($orders_result->num_rows > 0) : ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>User ID</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($order = $orders_result->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($order['order_number']); ?></td>
                                <td><?php echo htmlspecialchars($order['user_id']); ?></td>
                                <td><?php echo number_format($order['total_amount'], 2); ?> AED</td>
                                <td><?php echo htmlspecialchars($order['status']); ?></td>
                                <td>
                                    <form method="POST" action="M_index.php">
                                        <input type="hidden" name="order_id" value="<?php echo htmlspecialchars($order['id']); ?>">
                                        <select name="status" class="form-control mb-2">
                                            <option value="placed" <?php if ($order['status'] == 'placed') echo 'selected'; ?>>Placed</option>
                                            <option value="approved" <?php if ($order['status'] == 'approved') echo 'selected'; ?>>Approved</option>
                                            <option value="canceled" <?php if ($order['status'] == 'canceled') echo 'selected'; ?>>Canceled</option>
                                            <option value="shipped" <?php if ($order['status'] == 'shipped') echo 'selected'; ?>>Shipped</option>
                                            <option value="delivered" <?php if ($order['status'] == 'delivered') echo 'selected'; ?>>Delivered</option>
                                        </select>
                                        <button type="submit" name="update_status" class="btn btn-primary">Update Status</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>No orders found.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>