<?php
require '../php/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = mysqli_real_escape_string($connect, $_POST['category']);
    $brand = mysqli_real_escape_string($connect, $_POST['brand']);
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $price = floatval($_POST['price']);
    $occasion = mysqli_real_escape_string($connect, $_POST['occasion']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $img = mysqli_real_escape_string($connect, $_POST['img']);
    $long_description = mysqli_real_escape_string($connect, $_POST['long_description']);
    $promotion_type = mysqli_real_escape_string($connect, $_POST['promotion_type']);
    $is_new_arrival = isset($_POST['is_new_arrival']) ? 1 : 0;
    $is_featured = isset($_POST['is_featured']) ? 1 : 0;

    // Insert into inventory table
    $insert_inventory_query = "
        INSERT INTO inventory (category, brand, name, price, occasion, description, img, long_description)
        VALUES ('$category', '$brand', '$name', $price, '$occasion', '$description', '$img', '$long_description')
    ";
    if (!mysqli_query($connect, $insert_inventory_query)) {
        die('Insert inventory failed: ' . mysqli_error($connect));
    }

    // Get the last inserted inventory ID
    $inventory_id = mysqli_insert_id($connect);



    $insert_promotion_query = "
            INSERT INTO inventory_promotion (inventory_id, promotion_type, is_new_arrival, is_featured)
            VALUES ($inventory_id, '$promotion_type', $is_new_arrival, $is_featured)
        ";
    if (!mysqli_query($connect, $insert_promotion_query)) {
        die('Insert promotion failed: ' . mysqli_error($connect));
    }


    // Redirect to the inventory management page
    header('Location: ../supermanager/S_index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Inventory Item</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Add New Inventory Item</h1>

        <form method="POST" action="add.php">
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" id="category" name="category" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" id="brand" name="brand" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" id="price" name="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="occasion">Occasion</label>
                <input type="text" id="occasion" name="occasion" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="img">Image URL</label>
                <input type="text" id="img" name="img" class="form-control">
            </div>
            <div class="form-group">
                <label for="long_description">Long Description</label>
                <textarea id="long_description" name="long_description" class="form-control" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="promotion_type">Promotion Type</label>
                <input type="text" id="promotion_type" name="promotion_type" class="form-control">
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" id="is_new_arrival" name="is_new_arrival" class="form-check-input">
                    <label for="is_new_arrival" class="form-check-label">New Arrival</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" id="is_featured" name="is_featured" class="form-check-input">
                    <label for="is_featured" class="form-check-label">Featured</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add Item</button>
            <a href="../supermanager/S_index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>