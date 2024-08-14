<?php
// Start a session
session_start();

// Get the number of items from the form submission or default to 1
$numberOfItems = isset($_POST['number_of_items']) ? intval($_POST['number_of_items']) : 1;

// Store the number of items in the session
$_SESSION['number_of_items'] = $numberOfItems;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Multiple Inventory Items</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .item-form {
            position: relative;
        }

        .remove-btn {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>

<body>
    <div class="container my-4">
        <h1 class="mb-4">Add Multiple Inventory Items</h1>

        <!-- Form to specify the number of items -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="add_multiple_inventory.php" method="post" class="mb-4">
                        <div class="form-group">
                            <label for="number_of_items">Number of Items to Add</label>
                            <input type="number" class="form-control" id="number_of_items" name="number_of_items" min="1" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Set Number of Items</button>
                    </form>
                </div>
            </div>
        </div>


        <?php if (isset($_SESSION['number_of_items'])) : ?>
            <!-- Form to add multiple items -->
            <form action="insert_multiple_inventory.php" method="post">
                <?php for ($i = 1; $i <= $_SESSION['number_of_items']; $i++) : ?>
                    <div class="item-form mb-4 p-3 border border-secondary rounded">
                        <h5>Item <?php echo $i; ?></h5>
                        <input type="hidden" name="item_index[]" value="<?php echo $i; ?>">
                        <div class="form-group">
                            <label for="category-<?php echo $i; ?>">Category</label>
                            <input type="text" class="form-control" id="category-<?php echo $i; ?>" name="categories[]" required>
                        </div>
                        <div class="form-group">
                            <label for="brand-<?php echo $i; ?>">Brand</label>
                            <input type="text" class="form-control" id="brand-<?php echo $i; ?>" name="brands[]" required>
                        </div>
                        <div class="form-group">
                            <label for="name-<?php echo $i; ?>">Name</label>
                            <input type="text" class="form-control" id="name-<?php echo $i; ?>" name="names[]" required>
                        </div>
                        <div class="form-group">
                            <label for="price-<?php echo $i; ?>">Price</label>
                            <input type="number" step="0.01" class="form-control" id="price-<?php echo $i; ?>" name="prices[]" required>
                        </div>
                        <div class="form-group">
                            <label for="occasion-<?php echo $i; ?>">Occasion</label>
                            <input type="text" class="form-control" id="occasion-<?php echo $i; ?>" name="occasions[]" required>
                        </div>
                        <div class="form-group">
                            <label for="description-<?php echo $i; ?>">Description</label>
                            <textarea class="form-control" id="description-<?php echo $i; ?>" name="descriptions[]" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="img-<?php echo $i; ?>">Image URL</label>
                            <input type="text" class="form-control" id="img-<?php echo $i; ?>" name="imgs[]" required>
                        </div>
                        <!-- Remove button for this item -->
                        <a href="remove_item.php?index=<?php echo $i; ?>" class="btn btn-danger btn-sm remove-btn" onclick="return confirm('Are you sure you want to remove this item?');">Remove Item <?php echo $i; ?></a>
                    </div>
                <?php endfor; ?>
                <button type="submit" class="btn btn-success">Submit All Items</button>
            </form>
        <?php endif; ?>




        <a href="index.php" class="btn btn-secondary mt-3">Back to Inventory</a>
    </div>
</body>

</html>