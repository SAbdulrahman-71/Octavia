<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../php/db.php';
include('../data/fetch_inventory.php');
include('../cart/cart_btn.php');
include('../php/footer.php');

if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'super_manager') {
    header('Location: ../main/index.php');
    exit;
}

// Check if there's a message to display
$message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : '';

// Determine the active tab from URL parameters, default to 'users'
$activeTab = isset($_GET['tab']) ? htmlspecialchars($_GET['tab']) : 'users';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Manager Panel</title>
    <!-- <link rel="stylesheet" href="/scss/style.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/5b71452b8d.js" crossorigin="anonymous"></script>

    <style>
        .collapsible-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .collapsible-content.expanded {
            max-height: 100%;
        }
    </style>
</head>

<body class="S-index-container">
    <?php include('../php/header.php'); ?>
    <div class="container-fluid p-5">
        <?php if ($message) : ?>
            <div class="alert <?php echo strpos($message, 'Error') === false ? 'alert-success' : 'alert-danger'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <!-- Navigation Tabs -->
        <div class="pannels">
            <ul class="nav nav-tabs" id="managementTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link <?php echo $activeTab === 'users' ? 'active' : ''; ?>" id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="<?php echo $activeTab === 'users' ? 'true' : 'false'; ?>">Manage Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $activeTab === 'inventory' ? 'active' : ''; ?>" id="inventory-tab" data-toggle="tab" href="#inventory" role="tab" aria-controls="inventory" aria-selected="<?php echo $activeTab === 'inventory' ? 'true' : 'false'; ?>">Manage Inventory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $activeTab === 'profile' ? 'active' : ''; ?>" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="<?php echo $activeTab === 'profile' ? 'true' : 'false'; ?>">Manage Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $activeTab === 'orders' ? 'active' : ''; ?>" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="<?php echo $activeTab === 'orders' ? 'true' : 'false'; ?>">Manage Orders</a>
                </li>
            </ul>
        </div>

        <!-- Tab Content -->
        <div class="card tab-content" id="managementTabsContent">
            <!-- Users Tab -->
            <div class="tab-pane fade <?php echo $activeTab === 'users' ? 'show active' : ''; ?>" id="users" role="tabpanel" aria-labelledby="users-tab">
                <?php include '../user_management/users.php'; ?>
            </div>

            <!-- Inventory Tab -->
            <div class="tab-pane fade <?php echo $activeTab === 'inventory' ? 'show active' : ''; ?>" id="inventory" role="tabpanel" aria-labelledby="inventory-tab">
                <?php include '../inventory_management/inventory.php'; ?>
            </div>

            <!-- Profile Tab -->
            <div class="tab-pane fade <?php echo $activeTab === 'profile' ? 'show active' : ''; ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <?php include '../main/profile.php'; ?>
            </div>

            <!-- Orders Tab -->
            <div class="tab-pane fade <?php echo $activeTab === 'orders' ? 'show active' : ''; ?>" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                <?php include '../order_management/orders.php'; ?>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Automatically set the active tab from URL parameters
            const hash = window.location.hash.substring(1);
            if (hash) {
                const tab = document.querySelector(`a[href="#${hash}"]`);
                if (tab) {
                    tab.click();
                }
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>