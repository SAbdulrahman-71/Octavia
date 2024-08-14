<?php
$query = "SELECT * FROM orders";
$orders = mysqli_query($connect, $query);

if (!$orders) {
    die('Query failed: ' . mysqli_error($connect));
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