<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../php/db.php';

include('../cart/cart_btn.php');
include('../php/footer.php');

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../auth/login.php');
    exit;
}

// Check if there's a message to display
$message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Manager Panel</title>
    <link rel="stylesheet" href="/scss/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/5b71452b8d.js" crossorigin="anonymous"></script>

</head>

<body class="S-index-container ">
    <?php include('../php/header.php'); ?>
    <div class="container-fluid">
        <?php if ($message) : ?>
            <div class="alert <?php echo strpos($message, 'Error') === false ? 'alert-success' : 'alert-danger'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <!-- Navigation Tabs -->
        <div class="pannels">
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
        </div>

        <!-- Tab Content -->
        <div class="card tab-content" id="managementTabsContent">
            <!-- Users Tab -->
            <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                <?php include '../user_management/users.php'; ?>
            </div>

            <!-- Inventory Tab -->
            <div class="container-flex tab-pane fade" id="inventory" role="tabpanel" aria-labelledby="inventory-tab">
                <?php include '../inventory_management/inventory.php'; ?>
            </div>

            <!-- Orders Tab -->
            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                <?php include '../order_management/orders.php'; ?>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>