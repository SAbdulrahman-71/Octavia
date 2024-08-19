<?php
ob_start();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../auth/index.php');
    exit;
}

require('../data/fetch_inventory.php');
include '../php/db.php';
include('../php/header.php');
include('../cart/cart_btn.php');
include('../php/footer.php');

$message = "";

// Function to generate a random order number
function generateOrderNumber()
{
    $timestamp = time();
    $randomNumber = rand(1000, 9999);
    return 'ORD' . $timestamp . $randomNumber;
}

// Handle POST requests for cart operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $feedback = '';

    if (isset($_POST['update_cart'])) {
        $quantities = $_POST['quantities'] ?? [];
        $item_ids = $_POST['item_ids'] ?? [];

        foreach ($item_ids as $index => $item_id) {
            $itemId = filter_var($item_id, FILTER_SANITIZE_NUMBER_INT);
            $quantity = filter_var($quantities[$item_id] ?? 0, FILTER_SANITIZE_NUMBER_INT);

            if ($quantity > 0) {
                $_SESSION['cart'][$itemId] = $quantity;
                $feedback = '<div class="alert alert-success" role="alert">Cart updated successfully.</div>';
            } else {
                unset($_SESSION['cart'][$itemId]);
                $feedback = '<div class="alert alert-warning" role="alert">Item removed from cart.</div>';
            }
        }
    }

    if (isset($_POST['remove_from_cart'])) {
        $itemId = filter_var($_POST['item_id'], FILTER_SANITIZE_NUMBER_INT);
        unset($_SESSION['cart'][$itemId]);
        $feedback = '<div class="alert alert-warning" role="alert">Item removed from cart.</div>';
    }

    if (isset($_POST['check_out'])) {
        if (!isset($_SESSION['user_id'])) {
            die("User ID not set in session.");
        }

        $user_id = $_SESSION['user_id'];

        $order_number = generateOrderNumber();
        $total_amount = 0;

        foreach ($_SESSION['cart'] as $product_id => $quantity) {
            foreach ($inventory as $category => $products) {
                foreach ($products as $product) {
                    if ($product['id'] == $product_id) {
                        $total_amount += $product['price'] * $quantity;
                    }
                }
            }
        }

        $connect->begin_transaction();

        try {
            $insert_order = $connect->prepare("INSERT INTO orders (user_id, order_number, total_amount, status) VALUES (?, ?, ?, 'placed')");
            $insert_order->bind_param('ssd', $user_id, $order_number, $total_amount);
            $insert_order->execute();

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

            $connect->commit();
            unset($_SESSION['cart']);

            // Ensure 'name' is set in the session before using it
            $user_name = isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : 'User';

            // Construct the feedback message
            $_SESSION['feedback'] = '
            <div class="alert alert-success" role="alert">
                Dear ' . $user_name . ',
                <br>
                Your order has been submitted successfully with order number ' . htmlspecialchars($order_number) . '.
                <br>
                Thank you for shopping with us.
            </div>';

            // Redirect to the cart page
            header('Location: ../cart/view_cart.php');
            exit();
        } catch (Exception $e) {
            $connect->rollback();
            error_log("Failed to process the order: " . $e->getMessage());
            $_SESSION['feedback'] = '<div class="alert alert-danger" role="alert">Failed to process the order. Please try again later.</div>';
        }
    }

    // Redirect back to view_cart.php if no check_out action
    if (!isset($_POST['check_out'])) {
        header('Location: ../cart/view_cart.php');
        exit();
    }
}

ob_end_flush(); // End output buffering and flush output
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

        <div class="container card">
            <h2 class="mb-4">Cart</h2>
            <?php
            if (isset($_SESSION['feedback'])) {
                echo $_SESSION['feedback'];
                unset($_SESSION['feedback']);
            }

            ?>
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
                                                        <input type="number" class="form-control" name="quantities[<?php echo $product_id; ?>]" value="<?php echo $quantity; ?>" min="1">
                                                        <div class="input-group-append">
                                                            <input type="hidden" name="item_ids[]" value="<?php echo htmlspecialchars($product['id']); ?>">
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