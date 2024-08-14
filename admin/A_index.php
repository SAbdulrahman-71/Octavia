<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../php/db.php';
include('../php/header.php');
include('../cart/cart_btn.php');
include('../php/footer.php');


if (!isset($_SESSION['loggedin'])) {
    header('Location: ../auth/login.php');
    exit;
}
// Check if there's a message to display
$message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : '';

// Fetch users from the database
$query = "SELECT * FROM users";
$result = mysqli_query($connect, $query);
if (!$result) {
    die('Query failed: ' . mysqli_error($connect));
}

// Fetch orders from the database
$orders_query = "SELECT * FROM orders";
$orders = mysqli_query($connect, $orders_query);
if (!$orders) {
    die('Query failed: ' . mysqli_error($connect));
}

// Fetch inventory items from the database
$inventory_query = "SELECT * FROM inventory";
$inventory = mysqli_query($connect, $inventory_query);
if (!$inventory) {
    die('Query failed: ' . mysqli_error($connect));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Manager Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/scss/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .tab-content {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-top: 10px;
        }

        .btn-container {
            margin-bottom: 20px;
        }
    </style>
</head>

<body class="container py-5" style="margin-bottom: 10%;">
    <div class="card-header bg-success"><?php echo $_SESSION['name']; ?></div>
    <div class="card-body">
        <h1>welcome to manger pannel Dear <?php echo  $_SESSION['role'] . ' '  . $_SESSION['name'] . '!' ?> </h1>
    </div>


    <div class="container mt-5">
        <?php if ($message) : ?>
            <div class="alert <?php echo strpos($message, 'Error') === false ? 'alert-success' : 'alert-danger'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <!-- Navigation Tabs -->
        <ul class="nav nav-tabs" id="managementTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="true">Manage Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="inventory-tab" data-toggle="tab" href="#inventory" role="tab" aria-controls="inventory" aria-selected="false">Manage Inventory</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false">Manage Orders</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class=" card tab-content" id="managementTabsContent">
            <!-- Users Tab -->
            <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                <h1 class="mb-4">Manage Users</h1>
                <!-- Users Table -->
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['username']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td>
                                    <form action="../user_managment/update_role.php" method="post" style="display:inline;">
                                        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                        <select name="new_role" class="form-control form-control-sm">
                                            <option value="user" <?php echo $row['role'] == 'user' ? 'selected' : ''; ?>>User</option>
                                            <option value="admin" <?php echo $row['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                                            <option value="manager" <?php echo $row['role'] == 'manager' ? 'selected' : ''; ?>>Manager</option>
                                            <option value="super_manager" <?php echo $row['role'] == 'super_manager' ? 'selected' : ''; ?>>Super Manager</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary btn-sm mt-2">Update Role</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="../user_managment/delete_user.php" method="post" style="display:inline;">
                                        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                        <button type="submit" class="btn btn-danger btn-sm mt-2" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>


            <!-- Inventory Tab -->
            <div class="tab-pane fade" id="inventory" role="tabpanel" aria-labelledby="inventory-tab">
                <h1 class="mb-4">Manage Inventory</h1>
                <a href="../inventory_managment/add_multiple_inventory.php" class="btn btn-primary mb-3">Add Multiple New Items</a>

                <!-- Bulk Action Form -->
                <form action="../inventory_managment/bulk_action.php" method="post">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Select</th>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Occasion</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($inventory)) : ?>
                                    <tr>
                                        <td><input type="checkbox" name="items[]" value="<?php echo htmlspecialchars($row['id']); ?>"></td>
                                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                                        <td><?php echo htmlspecialchars($row['category']); ?></td>
                                        <td><?php echo htmlspecialchars($row['brand']); ?></td>
                                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                                        <td><?php echo number_format(htmlspecialchars($row['price']), 2); ?> AED</td>
                                        <td><?php echo htmlspecialchars($row['occasion']); ?></td>
                                        <td><img src="<?php echo htmlspecialchars($row['img']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" class="img-fluid" style="max-width: 100px;"></td>
                                        <td><?php echo htmlspecialchars($row['description']); ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Bulk Action Buttons -->
                    <div class="form-group">
                        <button type="submit" name="action" value="delete" class="btn btn-danger">Delete Selected</button>
                        <button type="submit" name="action" value="edit" class="btn btn-warning">Edit Selected</button>
                    </div>
                </form>
            </div>

            <!-- Orders Tab -->
            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                <h1 class="mb-4">Manage Orders</h1>
                <!-- Orders Table -->
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Order Number</th>
                            <th>Order Date</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($orders)) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['order_number']); ?></td>
                                <td><?php echo htmlspecialchars($row['order_date']); ?></td>
                                <td><?php echo number_format(htmlspecialchars($row['total_amount']), 2); ?> AED</td>
                                <td><?php echo htmlspecialchars($row['status']); ?></td>
                                <td>
                                    <form action="../order_managment/update_order.php" method="post" style="display:inline;">
                                        <input type="hidden" name="order_number" value="<?php echo htmlspecialchars($row['order_number']); ?>">
                                        <select name="new_order_status" class="form-control form-control-sm">
                                            <option value="placed" <?php echo $row['status'] == 'placed' ? 'selected' : ''; ?>>Placed</option>
                                            <option value="approved" <?php echo $row['status'] == 'approved' ? 'selected' : ''; ?>>Approved</option>
                                            <option value="canceled" <?php echo $row['status'] == 'canceled' ? 'selected' : ''; ?>>Canceled</option>
                                            <option value="shipped" <?php echo $row['status'] == 'shipped' ? 'selected' : ''; ?>>Shipped</option>
                                            <option value="delivered" <?php echo $row['status'] == 'delivered' ? 'selected' : ''; ?>>Delivered</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary btn-sm mt-2">Update Order</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>








</body>

</html>