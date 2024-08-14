<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require('../data/fetch_inventory.php');
?>

<link rel="stylesheet" href="../scss/style.css">
<!-- Modal HTML goes here (ensuring no PHP output before this) -->
<div class="modal fade py-5" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true" style="margin: 0">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">Cart Preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if (!empty($_SESSION['cart'])) : ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($_SESSION['cart'] as $product_id => $quantity) :
                                foreach ($inventory as $category => $products) :
                                    foreach ($products as $product) :
                                        if ($product['id'] == $product_id) :
                                            $item_total = $product['price'] * $quantity;
                                            $total += $item_total;
                            ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($product['name']); ?></td>
                                                <td><?php echo htmlspecialchars($quantity); ?></td>
                                                <td><?php echo number_format($product['price'], 2); ?> AED</td>
                                                <td><?php echo number_format($item_total, 2); ?> AED</td>
                                            </tr>
                            <?php
                                        endif;
                                    endforeach;
                                endforeach;
                            endforeach;
                            ?>
                            <tr>
                                <td colspan="3"><strong>Total</strong></td>
                                <td><strong><?php echo number_format($total, 2); ?> AED</strong></td>
                            </tr>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p>Your cart is empty.</p>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <a href="/cart/view_cart.php">Full View</a>
                <button type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>