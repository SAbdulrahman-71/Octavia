<?php
$items_per_page = 20; // Number of items per page
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($current_page - 1) * $items_per_page;
$search = isset($_GET['search']) ? mysqli_real_escape_string($connect, $_GET['search']) : '';
$featured = isset($_GET['featured']) ? 1 : 0;  // Default to 0 if not set
$new_arrival = isset($_GET['new_arrival']) ? 1 : 0;  // Default to 0 if not set

$search_condition = $search ? "WHERE i.name LIKE '%$search%' OR i.brand LIKE '%$search%' OR i.category LIKE '%$search%'" : '';
$featured_condition = $featured ? "AND p.is_featured = 1" : '';
$new_arrival_condition = $new_arrival ? "AND p.is_new_arrival = 1" : '';

$full_condition = "$search_condition $featured_condition $new_arrival_condition";

// Fetch the total number of records
$total_query = "SELECT COUNT(*) as total FROM inventory i LEFT JOIN inventory_promotion p ON i.id = p.inventory_id $full_condition";
$total_result = mysqli_query($connect, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_items = $total_row['total'];
$total_pages = ceil($total_items / $items_per_page);

// Fetch the records for the current page
$query = "
    SELECT 
        i.id, 
        i.category, 
        i.brand, 
        i.name, 
        i.price, 
        i.occasion, 
        i.img, 
        i.description,
        p.occasion AS promotion_occasion,
        p.category AS promotion_category,
        p.promotion_type,
        p.is_new_arrival,
        p.is_featured
    FROM 
        inventory i
    LEFT JOIN 
        inventory_promotion p ON i.id = p.inventory_id
    $full_condition
    LIMIT $offset, $items_per_page
";
$inventory = mysqli_query($connect, $query);

if (!$inventory) {
    die('Query failed: ' . mysqli_error($connect));
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Inventory</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="px-5 ">
        <h1 class="mb-4">Manage Inventory</h1>

        <!-- Search Form -->
        <form action="../supermanager/S_index.php" method="get" class="mb-3">
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <input type="text" name="search" class="form-control mb-2" placeholder="Search by name, brand, or category" value="<?php echo htmlspecialchars($search); ?>">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                </div>
            </div>
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <input type="checkbox" name="featured" id="featured" <?php echo $featured ? 'checked' : ''; ?>>
                    <label for="featured" class="form-check-label">Show Featured</label>
                </div>
                <div class="col-auto">
                    <input type="checkbox" name="new_arrival" id="new_arrival" <?php echo $new_arrival ? 'checked' : ''; ?>>
                    <label for="new_arrival" class="form-check-label">Show New Arrivals</label>
                </div>
            </div>
            <input type="hidden" name="page" value="<?php echo $current_page; ?>"> <!-- Preserve page number -->
        </form>

        <!-- Bulk Action Form -->
        <form action="../inventory_management/bulk_action.php" method="post">
            <div class="mb-3">
                <button type="submit" name="action" value="delete" class="btn btn-danger">Delete Selected</button>
                <button type="submit" name="action" value="edit" class="btn btn-warning">Edit Selected</button>
                <a href="../inventory_management/add_multiple_inventory.php" class="btn btn-primary">Add Multiple New Items</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Select</th>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Occasion</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Promotion Occasion</th>
                            <th>Promotion Category</th>
                            <th>Promotion Type</th>
                            <th>New Arrival</th>
                            <th>Featured</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($inventory)) : ?>
                            <tr>
                                <td><input type="checkbox" name="item_ids[]" value="<?php echo htmlspecialchars($row['id']); ?>"></td>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><input type="text" name="categories[<?php echo htmlspecialchars($row['id']); ?>]" value="<?php echo htmlspecialchars($row['category']); ?>"></td>
                                <td><input type="text" name="brands[<?php echo htmlspecialchars($row['id']); ?>]" value="<?php echo htmlspecialchars($row['brand']); ?>"></td>
                                <td><input type="text" name="names[<?php echo htmlspecialchars($row['id']); ?>]" value="<?php echo htmlspecialchars($row['name']); ?>"></td>
                                <td><input type="text" name="prices[<?php echo htmlspecialchars($row['id']); ?>]" value="<?php echo htmlspecialchars($row['price']); ?>"></td>
                                <td><input type="text" name="occasions[<?php echo htmlspecialchars($row['id']); ?>]" value="<?php echo htmlspecialchars($row['occasion']); ?>"></td>
                                <td><input type="text" name="imgs[<?php echo htmlspecialchars($row['id']); ?>]" value="<?php echo htmlspecialchars($row['img']); ?>"></td>
                                <td><input type="text" name="descriptions[<?php echo htmlspecialchars($row['id']); ?>]" value="<?php echo htmlspecialchars($row['description']); ?>"></td>
                                <td><input type="text" name="promotion_occasions[<?php echo htmlspecialchars($row['id']); ?>]" value="<?php echo htmlspecialchars($row['promotion_occasion']); ?>"></td>
                                <td><input type="text" name="promotion_categories[<?php echo htmlspecialchars($row['id']); ?>]" value="<?php echo htmlspecialchars($row['promotion_category']); ?>"></td>
                                <td><input type="text" name="promotion_types[<?php echo htmlspecialchars($row['id']); ?>]" value="<?php echo htmlspecialchars($row['promotion_type']); ?>"></td>
                                <td>
                                    <input type="checkbox" name="is_new_arrival[<?php echo htmlspecialchars($row['id']); ?>]" <?php echo $row['is_new_arrival'] ? 'checked' : ''; ?>>
                                </td>
                                <td>
                                    <input type="checkbox" name="is_featured[<?php echo htmlspecialchars($row['id']); ?>]" <?php echo $row['is_featured'] ? 'checked' : ''; ?>>
                                </td>
                                <td>
                                    <a href="../inventory_management/edit_inventory.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-info btn-sm">Edit</a>
                                    <a href="../inventory_management/delete_inventory.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </form>

        <!-- Pagination Controls -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item <?php if ($current_page <= 1) echo 'disabled'; ?>">
                    <a class="page-link" href="?page=<?php echo $current_page - 1; ?>&search=<?php echo htmlspecialchars($search); ?>&featured=<?php echo $featured; ?>&new_arrival=<?php echo $new_arrival; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?php if ($i == $current_page) echo 'active'; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo htmlspecialchars($search); ?>&featured=<?php echo $featured; ?>&new_arrival=<?php echo $new_arrival; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?php if ($current_page >= $total_pages) echo 'disabled'; ?>">
                    <a class="page-link" href="?page=<?php echo $current_page + 1; ?>&search=<?php echo htmlspecialchars($search); ?>&featured=<?php echo $featured; ?>&new_arrival=<?php echo $new_arrival; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>