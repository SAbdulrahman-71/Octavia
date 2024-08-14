<?php
// Include database connection
include '../php/db.php';  // Adjust the path as needed

// Start a session
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the item data from POST request
    $categories = isset($_POST['categories']) ? $_POST['categories'] : [];
    $brands = isset($_POST['brands']) ? $_POST['brands'] : [];
    $names = isset($_POST['names']) ? $_POST['names'] : [];
    $prices = isset($_POST['prices']) ? $_POST['prices'] : [];
    $occasions = isset($_POST['occasions']) ? $_POST['occasions'] : [];
    $descriptions = isset($_POST['descriptions']) ? $_POST['descriptions'] : [];
    $imgs = isset($_POST['imgs']) ? $_POST['imgs'] : [];

    $messages = [];

    // Get the number of items
    $count = count($categories);
    if (count($brands) === $count && count($names) === $count && count($prices) === $count && count($occasions) === $count && count($descriptions) === $count && count($imgs) === $count) {
        // Insert each item
        for ($i = 0; $i < $count; $i++) {
            $category = mysqli_real_escape_string($connect, $categories[$i]);
            $brand = mysqli_real_escape_string($connect, $brands[$i]);
            $name = mysqli_real_escape_string($connect, $names[$i]);
            $price = floatval($prices[$i]);
            $occasion = mysqli_real_escape_string($connect, $occasions[$i]);
            $description = mysqli_real_escape_string($connect, $descriptions[$i]);
            $img = mysqli_real_escape_string($connect, $imgs[$i]);

            $query = "INSERT INTO inventory (category, brand, name, price, occasion, description, img) VALUES ('$category', '$brand', '$name', $price, '$occasion', '$description', '$img')";

            if (mysqli_query($connect, $query)) {
                $messages[] = "Item $name added successfully";
            } else {
                $messages[] = "Error adding item $name: " . mysqli_error($connect);
            }
        }
    } else {
        $messages[] = 'Mismatch in form data. Please ensure all fields are filled correctly.';
    }

    // Clear session data
    unset($_SESSION['number_of_items']);
    unset($_SESSION['item_indexes']);

    // Redirect with messages
    $message = implode('<br>', $messages);


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
