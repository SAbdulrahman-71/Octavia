<?php

if (session_status() == PHP_SESSION_NONE) {

    session_start();
}

// Include database connection
include '../php/db.php';  // Adjust the path as needed
echo $_SESSION['role'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the item data from POST request
    $item_ids = isset($_POST['item_ids']) ? $_POST['item_ids'] : [];
    $categories = isset($_POST['categories']) ? $_POST['categories'] : [];
    $brands = isset($_POST['brands']) ? $_POST['brands'] : [];
    $names = isset($_POST['names']) ? $_POST['names'] : [];
    $prices = isset($_POST['prices']) ? $_POST['prices'] : [];
    $occasions = isset($_POST['occasions']) ? $_POST['occasions'] : [];
    $descriptions = isset($_POST['descriptions']) ? $_POST['descriptions'] : [];
    $imgs = isset($_POST['imgs']) ? $_POST['imgs'] : [];

    $messages = [];

    // Update each item
    foreach ($item_ids as $index => $id) {
        $id = intval($id);
        $category = mysqli_real_escape_string($connect, $categories[$index]);
        $brand = mysqli_real_escape_string($connect, $brands[$index]);
        $name = mysqli_real_escape_string($connect, $names[$index]);
        $price = floatval($prices[$index]);
        $occasion = mysqli_real_escape_string($connect, $occasions[$index]);
        $description = mysqli_real_escape_string($connect, $descriptions[$index]);
        $img = mysqli_real_escape_string($connect, $imgs[$index]);

        $query = "UPDATE inventory SET category='$category', brand='$brand', name='$name', price=$price, occasion='$occasion', description='$description', img='$img' WHERE id=$id";

        if (mysqli_query($connect, $query)) {
            $messages[] = "Item ID $id updated successfully ";
        } else {
            $messages[] = "Error updating item ID $id: " . mysqli_error($connect);
        }
    }

    // Redirect with messages
    $message = implode("\n", $messages);
    switch ($_SESSION['role']) {
        case 'super_manager':
            $redirect_url = '../supermanager/S_index.php';
            break;
        case 'manger':
            $redirect_url = '../manager/M_index.php';
            break;
        default:
            $redirect_url = '../auth/login.php';
    }
    header("Location:" . $redirect_url . "?message=" . urlencode($message));
    exit;
}
