<?php
include('../data/fetch_inventory.php'); // This should fetch the $inventory

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

// Function to get the image URL for an item
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

// Function to get order details
function get_details($order_items, $inventory, $order_number)
{
    if (isset($order_items[$order_number])) {
        $details = '';
        foreach ($order_items[$order_number] as $order_item) {
            $details .= '<div>';
            $details .= '<strong>Item ID:</strong> ' . htmlspecialchars($order_item['item_id']) . '<br>';
            $details .= '<img src="' . htmlspecialchars(get_img($inventory, $order_item['item_id'])) . '" alt="Item Image" style="max-width: 100px; max-height: 100px;"><br>';
            $details .= '<strong>Quantity:</strong> ' . htmlspecialchars($order_item['item_qty']) . '<br>';
            $details .= '<strong>Price:</strong> ' . htmlspecialchars($order_item['item_price_current']) . '<br><br>';
            $details .= '</div>';
        }
        return $details;
    }
    return '<p>No items found for this order.</p>';
}
?>

<h1 class="mb-4">Manage Orders</h1>
<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Order Number</th>
            <th>Order Date</th>
            <th>Total Amount</th>
            <th>Status</th>
            <th>Items</th>
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

                    <button class="btn btn-info btn-sm mt-2 toggle-button" data-target="#details-<?php echo htmlspecialchars($row['order_number']); ?>">
                        View Details
                    </button>
                    <div id="details-<?php echo htmlspecialchars($row['order_number']); ?>" class="collapsible-content">
                        <div class="card-body">
                            <?php echo get_details($order_items, $inventory, $row['order_number']); ?>
                        </div>
                    </div>
                </td>
                <td>
                    <form action="../order_management/update_order.php" method="post" style="display:inline;">
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