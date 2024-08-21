<?php
include('../php/db.php');
include('../data/fetch_inventory.php');
include('../order_management/order_details.php');
include('../cart/cart_btn.php');


// Fetch orders
$query = "SELECT * FROM orders";
$orders = mysqli_query($connect, $query);

if (!$orders) {
    die('Query failed: ' . mysqli_error($connect));
}

// Fetch order items
$order_items_query = "SELECT * FROM order_items";
$order_items_result = mysqli_query($connect, $order_items_query);

if (!$order_items_result) {
    die('Query failed: ' . mysqli_error($connect));
}

// Organize order items by order number
$order_items = [];
while ($item = mysqli_fetch_assoc($order_items_result)) {
    $order_number = $item['order_number'];
    if (!isset($order_items[$order_number])) {
        $order_items[$order_number] = [];
    }
    $order_items[$order_number][] = $item;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../scss/style.css">
    <title>| Profile</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

<body class="profile-container">
    <header>
        <?php include('../php/header.php') ?>
    </header>

    <div class="card container m-5">
        <h1>Profile Information:</h1>
        <div class="row">
            <div class="col-md-4">
                <h2>Profile Information</h2>
                <p><strong>Username:</strong> <?php echo htmlspecialchars($_SESSION['name']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>
            </div>

            <div class="col-md-8 pl-5">
                <h2>Order History</h2>
                <?php echo generate_order_details($orders, $order_items, $inventory); ?>
            </div>
        </div>
    </div>

    <footer>
        <?php include('../php/footer.php') ?>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Add event listeners to all toggle buttons
            document.querySelectorAll('.toggle-button').forEach(button => {
                button.addEventListener('click', () => {
                    const targetId = button.getAttribute('data-target');
                    const collapsibleContent = document.querySelector(targetId);

                    if (collapsibleContent.classList.contains('expanded')) {
                        collapsibleContent.classList.remove('expanded');
                        button.textContent = 'View Details';
                    } else {
                        collapsibleContent.classList.add('expanded');
                        button.textContent = 'Hide Details';
                    }
                });
            });
        });
    </script>
</body>

</html>