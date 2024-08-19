<?php
// order_details.php

// Ensure session is started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('../php/db.php');
include('../data/fetch_inventory.php');

// Fetch orders
$query = "SELECT * FROM orders";
$orders = mysqli_query($connect, $query);

if (!$orders) {
    die('Query failed: ' . mysqli_error($connect));
}

// Fetch order items and organize them by order_number
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


function get_img($inventory, $item_id)
{
    foreach ($inventory as $category => $items) {
        foreach ($items as $item) {
            if ($item['id'] == $item_id) {
                return $item['img'];
            }
        }
    }
    return '';
}


function generate_order_details($orders, $order_items, $inventory)
{
    ob_start();
    while ($my_order = mysqli_fetch_assoc($orders)) {
        if ($_SESSION['user_id'] == $my_order['user_id']) {
?>
            <div class="card row p-2 mb-3 mr-5">
                <div class="card-header d-flex flex-column">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <strong>Order Number:</strong> <?php echo htmlspecialchars($my_order['order_number']); ?>
                        </div>
                        <div class="col-md-6">
                            <strong>Date:</strong> <?php echo htmlspecialchars($my_order['order_date']); ?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <strong>Total Amount:</strong> <?php echo htmlspecialchars($my_order['total_amount']); ?>
                        </div>
                        <div class="col-md-6">
                            <strong>Status:</strong> <?php echo htmlspecialchars($my_order['status']); ?>
                        </div>
                    </div>
                    <button class="btn btn-info btn-sm mt-2 toggle-button" data-target="#details-<?php echo htmlspecialchars($my_order['order_number']); ?>">
                        View Details
                    </button>
                </div>
                <div id="details-<?php echo htmlspecialchars($my_order['order_number']); ?>" class="collapsible-content">
                    <div class="card-body">
                        <?php if (isset($order_items[$my_order['order_number']])): ?>
                            <?php foreach ($order_items[$my_order['order_number']] as $order_item): ?>
                                <p>
                                    <strong>Item ID:</strong> <?php echo htmlspecialchars($order_item['item_id']); ?>
                                    <br>
                                    <img src="<?php echo htmlspecialchars(get_img($inventory, $order_item['item_id'])); ?>" alt="Item Image" style="max-width: 100px; max-height: 100px;">
                                    <br>
                                    <strong>Quantity:</strong> <?php echo htmlspecialchars($order_item['item_qty']); ?>
                                    <br>
                                    <strong>Price:</strong> <?php echo htmlspecialchars($order_item['item_price_current']); ?>
                                </p>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No items found for this order.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
<?php
        }
    }
    return ob_get_clean();
}
?>