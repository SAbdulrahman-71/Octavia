<?php
include '../php/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    $item_ids = isset($_POST['item_ids']) ? $_POST['item_ids'] : [];
    $categories = isset($_POST['categories']) ? $_POST['categories'] : [];
    $brands = isset($_POST['brands']) ? $_POST['brands'] : [];
    $names = isset($_POST['names']) ? $_POST['names'] : [];
    $prices = isset($_POST['prices']) ? $_POST['prices'] : [];
    $occasions = isset($_POST['occasions']) ? $_POST['occasions'] : [];
    $imgs = isset($_POST['imgs']) ? $_POST['imgs'] : [];
    $descriptions = isset($_POST['descriptions']) ? $_POST['descriptions'] : [];
    $promotion_names = isset($_POST['promotion_names']) ? $_POST['promotion_names'] : [];
    $promotion_types = isset($_POST['promotion_types']) ? $_POST['promotion_types'] : [];
    $is_new_arrival = isset($_POST['is_new_arrival']) ? $_POST['is_new_arrival'] : [];
    $is_featured = isset($_POST['is_featured']) ? $_POST['is_featured'] : [];

    $messages = [];

    if ($action === 'delete') {
        foreach ($item_ids as $id) {
            $id = intval($id);
            $query = "DELETE FROM inventory WHERE id=$id";
            if (mysqli_query($connect, $query)) {
                $messages[] = "Item ID $id deleted successfully.";
            } else {
                $messages[] = "Error deleting item ID $id: " . mysqli_error($connect);
            }
        }
    } elseif ($action === 'edit') {
        foreach ($item_ids as $index => $id) {
            $id = intval($id);
            $category = mysqli_real_escape_string($connect, $categories[$id]);
            $brand = mysqli_real_escape_string($connect, $brands[$id]);
            $name = mysqli_real_escape_string($connect, $names[$id]);
            $price = floatval($prices[$id]);
            $occasion = mysqli_real_escape_string($connect, $occasions[$id]);
            $img = mysqli_real_escape_string($connect, $imgs[$id]);
            $description = mysqli_real_escape_string($connect, $descriptions[$id]);
            $promotion_name = mysqli_real_escape_string($connect, $promotion_names[$id]);
            $promotion_type = mysqli_real_escape_string($connect, $promotion_types[$id]);
            $new_arrival = isset($is_new_arrival[$id]) ? 1 : 0;
            $featured = isset($is_featured[$id]) ? 1 : 0;

            // Update inventory table
            $query = "
                UPDATE inventory 
                SET category='$category', brand='$brand', name='$name', price=$price, occasion='$occasion', img='$img', description='$description' 
                WHERE id=$id
            ";
            mysqli_query($connect, $query);

            // Update inventory_promotion table
            $query = "
                INSERT INTO inventory_promotion (inventory_id, name, promotion_type, is_new_arrival, is_featured)
                VALUES ($id, '$promotion_name', '$promotion_type', $new_arrival, $featured)
                ON DUPLICATE KEY UPDATE 
                    name='$promotion_name', 
                    promotion_type='$promotion_type', 
                    is_new_arrival=$new_arrival, 
                    is_featured=$featured
            ";
            if (mysqli_query($connect, $query)) {
                $messages[] = "Item ID $id updated successfully.";
            } else {
                $messages[] = "Error updating item ID $id: " . mysqli_error($connect);
            }
        }
    }

    // Redirect with messages
    $message = implode("\n", $messages);
    header("Location: ../supermanager/S_index.php?message=" . urlencode($message));
    exit;
}
