<?php
// Include database connection
include '../php/db.php';  // Adjust the path as needed

// Get the item IDs from the query string
$item_ids = isset($_GET['items']) ? explode(',', $_GET['items']) : [];

// Fetch the details of the selected items
$items = [];
if (!empty($item_ids)) {
    $ids = implode(',', array_map('intval', $item_ids));
    $query = "SELECT * FROM inventory WHERE id IN ($ids)";
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die('Query failed: ' . mysqli_error($connect));
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $items[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Inventory</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-4">
        <h1 class="mb-4">Edit Inventory</h1>

        <!-- Form to update multiple items -->
        <form action="update_bulk_inventory.php" method="post">
            <?php foreach ($items as $item) : ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Item ID: <?php echo htmlspecialchars($item['id']); ?></h5>
                        <input type="hidden" name="item_ids[]" value="<?php echo htmlspecialchars($item['id']); ?>">

                        <div class="form-group">
                            <label for="category-<?php echo htmlspecialchars($item['id']); ?>">Category</label>
                            <input type="text" class="form-control" id="category-<?php echo htmlspecialchars($item['id']); ?>" name="categories[]" value="<?php echo htmlspecialchars($item['category']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="brand-<?php echo htmlspecialchars($item['id']); ?>">Brand</label>
                            <input type="text" class="form-control" id="brand-<?php echo htmlspecialchars($item['id']); ?>" name="brands[]" value="<?php echo htmlspecialchars($item['brand']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="name-<?php echo htmlspecialchars($item['id']); ?>">Name</label>
                            <input type="text" class="form-control" id="name-<?php echo htmlspecialchars($item['id']); ?>" name="names[]" value="<?php echo htmlspecialchars($item['name']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="price-<?php echo htmlspecialchars($item['id']); ?>">Price</label>
                            <input type="number" step="0.01" class="form-control" id="price-<?php echo htmlspecialchars($item['id']); ?>" name="prices[]" value="<?php echo htmlspecialchars($item['price']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="occasion-<?php echo htmlspecialchars($item['id']); ?>">Occasion</label>
                            <input type="text" class="form-control" id="occasion-<?php echo htmlspecialchars($item['id']); ?>" name="occasions[]" value="<?php echo htmlspecialchars($item['occasion']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="description-<?php echo htmlspecialchars($item['id']); ?>">Description</label>
                            <textarea class="form-control" id="description-<?php echo htmlspecialchars($item['id']); ?>" name="descriptions[]" rows="3" required><?php echo htmlspecialchars($item['description']); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="img-<?php echo htmlspecialchars($item['id']); ?>">Image URL</label>
                            <input type="text" class="form-control" id="img-<?php echo htmlspecialchars($item['id']); ?>" name="imgs[]" value="<?php echo htmlspecialchars($item['img']); ?>" required>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <button type="submit" class="btn btn-primary">Update Items</button>
        </form>

        <a href="index.php" class="btn btn-secondary mt-3">Back to Inventory</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>