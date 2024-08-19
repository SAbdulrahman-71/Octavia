<?php
session_start();
require('../php/db.php');

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: ../main/index.php');
    exit;
}

// Function to mark notifications as read
function markNotificationAsRead($notification_id)
{
    global $connect;
    $stmt = $connect->prepare("UPDATE notifications SET is_read = TRUE WHERE id = ?");
    $stmt->bind_param("i", $notification_id);
    $stmt->execute();
}

// Mark a notification as read if requested
if (isset($_GET['mark_read']) && isset($_GET['notification_id'])) {
    $notification_id = $_GET['notification_id'];
    markNotificationAsRead($notification_id);
}

// Fetch user information
$user_id = $_SESSION['user_id'];
$user_query = $connect->prepare("SELECT * FROM users WHERE id = ?");
$user_query->bind_param("i", $user_id);
$user_query->execute();
$user_result = $user_query->get_result();
$user = $user_result->fetch_assoc();

// Fetch user orders
$orders_query = $connect->prepare("SELECT * FROM orders WHERE user_id = ?");
$orders_query->bind_param("i", $user_id);
$orders_query->execute();
$orders_result = $orders_query->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../scss/style.css"> -->
</head>

<body>
    <?php include('../php/header.php'); ?>

    <div class="container mt-5">
        <h1>Profile</h1>
        <div class="row">
            <div class="col-md-4">
                <h2>Profile Information</h2>
                <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            </div>
            <div class="col-md-8">
                <h2>Order History</h2>
                <?php if ($orders_result->num_rows > 0): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order Number</th>
                                <th>Date</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($order = $orders_result->fetch_assoc()): ?>
                                <tr>
                                    <td><a href="../main/details.php"><?php echo htmlspecialchars($order['order_number']);
                                                                        $_SESSION['order_number'] = $order['order_number'];

                                                                        $ORD = $_SESSION['order_number']
                                                                        ?></a></td>
                                    <td><?php echo htmlspecialchars($order['order_date']); ?></td>
                                    <td><?php echo htmlspecialchars($order['total_amount']); ?> AED</td>
                                    <td><?php echo htmlspecialchars($order['status']); ?></td>
                                    <td>
                                        <!-- Button to show/hide order details -->
                                        <button class="btn btn-info btn-sm" type="button" data-toggle="collapse" data-target="#details-<?php echo htmlspecialchars($ORD); ?>">View Details</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        <div id="details-<?php echo htmlspecialchars($ORD); ?>" class="collapse">
                                            <?php
                                            // Fetch order details for the specific order
                                            $number = $ORD;
                                            $orders_details_query = $connect->prepare("SELECT * FROM order_items WHERE order_number = ?");
                                            $orders_details_query->bind_param("i", $number);
                                            $orders_details_query->execute();
                                            $orders_details_result = $orders_details_query->get_result();
                                            ?>
                                            <?php if ($orders_details_result->num_rows > 0): ?>
                                                <table class="table table-bordered mt-2">
                                                    <thead>
                                                        <tr>
                                                            <th>Item Name</th>
                                                            <th>Quantity</th>
                                                            <th>Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($order_details = $orders_details_result->fetch_assoc()): ?>

                                                            <tr>
                                                                <td><?php
                                                                    // Assuming item_name is a column in order_items
                                                                    echo htmlspecialchars($ORD);
                                                                    // echo htmlspecialchars($order_details['item_id']);
                                                                    ?></td>
                                                                <td><?php echo htmlspecialchars($order_details['item_qty']); ?></td>
                                                                <td><?php echo htmlspecialchars($order_details['item_price_current']); ?> AED</td>
                                                            </tr>


                                                        <?php endwhile; ?>
                                                    </tbody>
                                                </table>
                                            <?php else: ?>
                                                <p>No details found for this order.</p>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No orders found.</p>
                <?php endif; ?>

                <h2 class="mt-4">Wishlist</h2>
                <?php
                // Fetch user wishlist
                $wishlist_query = $connect->prepare("SELECT i.* FROM wishlist w JOIN inventory i ON w.item_id = i.id WHERE w.user_id = ?");
                $wishlist_query->bind_param("i", $user_id);
                $wishlist_query->execute();
                $wishlist_result = $wishlist_query->get_result();
                ?>
                <?php if ($wishlist_result->num_rows > 0): ?>
                    <ul class="list-group">
                        <?php while ($item = $wishlist_result->fetch_assoc()): ?>
                            <li class="list-group-item">
                                <?php echo htmlspecialchars($item['name']); ?> - $<?php echo htmlspecialchars($item['price']); ?>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php else: ?>
                    <p>Your wishlist is empty.</p>
                <?php endif; ?>

                <h2 class="mt-4">Notifications</h2>
                <?php
                // Fetch user notifications
                $notifications_query = $connect->prepare("SELECT * FROM notifications WHERE user_id = ? ORDER BY created_at DESC");
                $notifications_query->bind_param("i", $user_id);
                $notifications_query->execute();
                $notifications_result = $notifications_query->get_result();
                ?>
                <?php if ($notifications_result->num_rows > 0): ?>
                    <ul class="list-group">
                        <?php while ($notification = $notifications_result->fetch_assoc()): ?>
                            <li class="list-group-item">
                                <?php echo htmlspecialchars($notification['message']); ?>
                                <small class="text-muted"><?php echo htmlspecialchars($notification['created_at']); ?></small>
                                <?php if (!$notification['is_read']): ?>
                                    <a href="?mark_read=true&notification_id=<?php echo $notification['id']; ?>" class="btn btn-sm btn-primary float-right">Mark as Read</a>
                                <?php endif; ?>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php else: ?>
                    <p>No notifications.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>