<?php
include '../php/db.php';

$id = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = mysqli_real_escape_string($connect, $_POST['category']);
    $brand = mysqli_real_escape_string($connect, $_POST['brand']);
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $price = mysqli_real_escape_string($connect, $_POST['price']);
    $occasion = mysqli_real_escape_string($connect, $_POST['occasion']);
    $img = mysqli_real_escape_string($connect, $_POST['img']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $promotion_name = mysqli_real_escape_string($connect, $_POST['promotion_name']);
    $promotion_type = mysqli_real_escape_string($connect, $_POST['promotion_type']);
    $is_new_arrival = isset($_POST['is_new_arrival']) ? 1 : 0;
    $is_featured = isset($_POST['is_featured']) ? 1 : 0;

    $update_query = "
        UPDATE inventory i
        LEFT JOIN inventory_promotion p ON i.id = p.inventory_id
        SET 
            i.category = '$category',
            i.brand = '$brand',
            i.name = '$name',
            i.price = '$price',
            i.occasion = '$occasion',
            i.img = '$img',
            i.description = '$description',
            p.name = '$promotion_name',
            p.promotion_type = '$promotion_type',
            p.is_new_arrival = $is_new_arrival,
            p.is_featured = $is_featured
        WHERE i.id = $id
    ";

    if (mysqli_query($connect, $update_query)) {
        header('Location: ../supermanager/S_index.php');
        exit();
    } else {
        die('Update failed: ' . mysqli_error($connect));
    }
}

$query = "SELECT * FROM inventory i LEFT JOIN inventory_promotion p ON i.id = p.inventory_id WHERE i.id = $id";
$result = mysqli_query($connect, $query);
$item = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Inventory</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h1>Edit Inventory Item</h1>
        <form action="edit_inventory.php?id=<?php echo htmlspecialchars($id); ?>" method="post">
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" id="category" name="category" class="form-control" value="<?php echo htmlspecialchars($item['category']); ?>">
            </div>
            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" id="brand" name="brand" class="form-control" value="<?php echo htmlspecialchars($item['brand']); ?>">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($item['name']); ?>">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id="price" name="price" class="form-control" value="<?php echo htmlspecialchars($item['price']); ?>">
            </div>
            <div class="form-group">
                <label for="occasion">Occasion</label>
                <input type="text" id="occasion" name="occasion" class="form-control" value="<?php echo htmlspecialchars($item['occasion']); ?>">
            </div>
            <div class="form-group">
                <label for="img">Image URL</label>
                <input type="text" id="img" name="img" class="form-control" value="<?php echo htmlspecialchars($item['img']); ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control"><?php echo htmlspecialchars($item['description']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="promotion_name">Promotion Name</label>
                <input type="text" id="promotion_name" name="promotion_name" class="form-control" value="<?php echo htmlspecialchars($item['promotion_name']); ?>">
            </div>
            <div class="form-group">
                <label for="promotion_type">Promotion Type</label>
                <input type="text" id="promotion_type" name="promotion_type" class="form-control" value="<?php echo htmlspecialchars($item['promotion_type']); ?>">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" id="is_new_arrival" name="is_new_arrival" class="form-check-input" <?php echo $item['is_new_arrival'] ? 'checked' : ''; ?>>
                <label for="is_new_arrival" class="form-check-label">New Arrival</label>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" id="is_featured" name="is_featured" class="form-check-input" <?php echo $item['is_featured'] ? 'checked' : ''; ?>>
                <label for="is_featured" class="form-check-label">Featured</label>
            </div>
            <button type="submit" class="btn btn-primary">Update Item</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>