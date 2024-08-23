<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'] ?? 0;
    $product_id = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
    $action = $_POST['action'] ?? '';

    if ($user_id && $product_id && in_array($action, ['add', 'remove'])) {
        if ($action === 'add') {
            $stmt = $connect->prepare("INSERT INTO wishlist (user_id, item_id) VALUES (?, ?)");
            $stmt->bind_param('ii', $user_id, $product_id);
            $stmt->execute();
            $stmt->close();
        } elseif ($action === 'remove') {
            $stmt = $connect->prepare("DELETE FROM wishlist WHERE user_id = ? AND item_id = ?");
            $stmt->bind_param('ii', $user_id, $product_id);
            $stmt->execute();
            $stmt->close();
        }
    }
}
