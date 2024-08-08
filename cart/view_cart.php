<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect to login page if user is not logged in
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

// Include files for fetching inventory and database connection
require('../data/fetch_inventory.php');
include '../php/db.php';
include('../php/header.php');
include('../cart/cart_btn.php');
include('../php/footer.php');



function generateOrderNumber()
{
    $timestamp = time();
    $randomNumber = rand(1000, 9999); // Generate a random number between 1000 and 9999
    return 'ORD' . $timestamp . $randomNumber; // Prefix with 'ORD' for easy identification
}


// Handle POST requests for cart operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_cart'])) {
        // Update cart quantity
        $itemId = $_POST['item_id'];
        $quantity = (int)$_POST['quantity'];

        if ($quantity > 0) {
            $_SESSION['cart'][$itemId] = $quantity;
        } else {
            unset($_SESSION['cart'][$itemId]);
        }
    }

    if (isset($_POST['remove_from_cart'])) {
        // Remove item from cart
        $itemId = $_POST['item_id'];
        unset($_SESSION['cart'][$itemId]);
    }

    if (isset($_POST['check_out'])) {
        if (!isset($_SESSION['user_id'])) {
            die("User ID not set in session.");
        }

        $user_id = $_SESSION['user_id'];
        $order_number = generateOrderNumber(); // Generate a unique order number
        $total_amount = 0;

        // Calculate the total amount
        foreach ($_SESSION['cart'] as $product_id => $quantity) {
            foreach ($inventory as $category => $products) {
                foreach ($products as $product) {
                    if ($product['id'] == $product_id) {
                        $total_amount += $product['price'] * $quantity;
                    }
                }
            }
        }

        // Start a database transaction
        $connect->begin_transaction();

        try {
            // Insert into orders table
            $insert_order = $connect->prepare("INSERT INTO orders (user_id, order_number, total_amount, status) VALUES (?, ?, ?, 'placed')");
            $insert_order->bind_param('ssd', $user_id, $order_number, $total_amount);
            $insert_order->execute();

            // Insert into order_items table
            $insert_order_item = $connect->prepare("INSERT INTO order_items (order_number, item_id, item_qty, item_price_current) VALUES (?, ?, ?, ?)");
            foreach ($_SESSION['cart'] as $product_id => $quantity) {
                foreach ($inventory as $category => $products) {
                    foreach ($products as $product) {
                        if ($product['id'] == $product_id) {
                            $item_price_current = $product['price'];
                            $insert_order_item->bind_param('siid', $order_number, $product_id, $quantity, $item_price_current);
                            $insert_order_item->execute();
                        }
                    }
                }
            }

            // Commit the transaction
            $connect->commit();

            // Clear the cart
            unset($_SESSION['cart']);

            // Redirect to order confirmation page
            header('Location: view_cart.php');
            exit();
        } catch (Exception $e) {
            // Rollback the transaction on error
            $connect->rollback();
            echo "Failed to process the order: " . $e->getMessage();
        }
    }

    // Redirect back to view_cart.php if no check_out action
    header('Location: view_cart.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart View</title>
    <link rel="stylesheet" href="/scss/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="container">

    <!-- Main content -->
    <div style="margin-top: 10%; margin-bottom:10%">
        <div class="container">
            <h2 class="mb-4">Cart</h2>
            <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) : ?>
                <form method="POST" action="view_cart.php">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($_SESSION['cart'] as $product_id => $quantity) :
                                foreach ($inventory as $category => $products) {
                                    foreach ($products as $product) {
                                        if ($product['id'] == $product_id) {
                                            $product_total = $product['price'] * $quantity;
                                            $total += $product_total;
                            ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($product['name']); ?></td>
                                                <td>
                                                    <div class="input-group mb-4">
                                                        <input type="number" class="form-control" name="quantity" value="<?php echo $quantity ?>" min="1">
                                                        <div class="input-group-append">
                                                            <input type="hidden" name="item_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                                                            <button type="submit" class="btn btn-success" name="update_cart" value="1">Update</button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?php echo number_format($product['price'], 2); ?> AED</td>
                                                <td><?php echo number_format($product_total, 2); ?> AED</td>
                                                <td>
                                                    <form method="POST" action="view_cart.php">
                                                        <input type="hidden" name="item_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                                                        <button type="submit" class="btn btn-danger" name="remove_from_cart" value="1">Remove</button>
                                                    </form>
                                                </td>
                                            </tr>
                            <?php
                                        }
                                    }
                                }
                            endforeach;
                            ?>
                            <tr>
                                <td colspan="3" class="text-right"><strong>Total</strong></td>
                                <td><?php echo number_format($total, 2); ?> AED</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" name="check_out" class="btn btn-primary ml-5">Check out</button>
                </form>
            <?php else : ?>
                <p>Your cart is empty.</p>
            <?php endif; ?>
        </div>
    </div>



</body>

</html>