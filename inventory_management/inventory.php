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
        i.long_description,
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

// Handle POST requests for edit and delete operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['edit_item'])) {
        $id = intval($_POST['id']);
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

        // Update inventory table
        $update_inventory_query = "
            UPDATE inventory
            SET
                category = '$category',
                brand = '$brand',
                name = '$name',
                price = $price,
                occasion = '$occasion',
                description = '$description',
                img = '$img',
                long_description = '$long_description'
            WHERE id = $id
        ";
        mysqli_query($connect, $update_inventory_query);


        // if ($promotion_type !== '') {
        $update_promotion_query = "
                INSERT INTO inventory_promotion (inventory_id, promotion_type, is_new_arrival, is_featured)
                VALUES ($id, '$promotion_type', $is_new_arrival, $is_featured)
                ON DUPLICATE KEY UPDATE
                    promotion_type = VALUES(promotion_type),
                    is_new_arrival = VALUES(is_new_arrival),
                    is_featured = VALUES(is_featured)
            ";
        mysqli_query($connect, $update_promotion_query);
        // }
    }

    if (isset($_POST['delete_item'])) {
        $id = intval($_POST['id']);
        $delete_query = "DELETE FROM inventory WHERE id = $id";
        mysqli_query($connect, $delete_query);
    }

    // Redirect to the same page to see the updated changes
    header("Location: ../supermanager/S_index.php?page=$current_page&search=" . urlencode($search) . "&featured=$featured&new_arrival=$new_arrival");

    exit;
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
    <div class="px-5">
        <h1 class="mb-4">Manage Inventory</h1>

        <!-- Search Form -->
        <form action="../supermanager/S_index.php" method="get" class="mb-3">
            <div class="form-row align-items-center mb-3">
                <div class="col-auto">
                    <input type="text" name="search" class="form-control mb-2" placeholder="Search by name, brand, or category" value="<?php echo htmlspecialchars($search); ?>">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                </div>
                <div class="col-auto">
                    <a href="../inventory_management/add.php" class="btn btn-secondary mb-2">Add To Inventory</a>
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

        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($inventory)) : ?>
                <div class="col-md-12">
                    <div class="card mb-4" style="max-height: 100%; padding-left:1%">
                        <div class="row no-gutters">

                            <div class="col-md-2 image-section">
                                <img src="<?php echo htmlspecialchars($row['img']); ?>" class="img-fluid" alt="Product Image">
                            </div>

                            <div class="col-md-8 text-boxes-section px-5">
                                <form method="POST" action="../supermanager/S_index.php">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                    <div class="row">
                                        <!-- Display item details -->
                                        <?php foreach ($row as $key => $value): ?>
                                            <div class="col-6 col-md-4 text-box-container">
                                                <label for="<?php echo htmlspecialchars($key . '_' . $row['id']); ?>"><?php echo ucfirst(str_replace('_', ' ', $key)); ?></label>
                                                <?php if ($key === 'description' || $key === 'long_description'): ?>
                                                    <input type="text" id="<?php echo htmlspecialchars($key . '_' . $row['id']); ?>" name="<?php echo htmlspecialchars($key); ?>" class="form-control" value="<?php echo htmlspecialchars($value); ?>">
                                                <?php elseif ($key === 'is_new_arrival' || $key === 'is_featured'): ?>
                                                    <input type="checkbox" id="<?php echo htmlspecialchars($key . '_' . $row['id']); ?>" name="<?php echo htmlspecialchars($key); ?>" <?php echo $value ? 'checked' : ''; ?>>
                                                <?php else: ?>
                                                    <input type="text" id="<?php echo htmlspecialchars($key . '_' . $row['id']); ?>" name="<?php echo htmlspecialchars($key); ?>" class="form-control" value="<?php echo htmlspecialchars($value); ?>">
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; ?>
                                        <!-- Edit and Delete Buttons -->
                                        <div class="col-6 col-md-4 text-box-container">
                                            <button type="submit" class="btn btn-warning" name="edit_item" value="1">Edit</button>
                                        </div>
                                    </div>
                                </form>
                                <form method="POST" action="../supermanager/S_index.php" class="d-inline">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                    <button type="submit" class="btn btn-danger" name="delete_item" value="1" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item <?php if ($current_page <= 1) echo 'disabled'; ?>">
                    <a class="page-link" href="../supermanager/S_index.php?page=<?php echo $current_page - 1; ?>&search=<?php echo urlencode($search); ?>&featured=<?php echo $featured; ?>&new_arrival=<?php echo $new_arrival; ?>" tabindex="-1">Previous</a>
                </li>
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?php if ($i == $current_page) echo 'active'; ?>">
                        <a class="page-link" href="../supermanager/S_index.php?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>&featured=<?php echo $featured; ?>&new_arrival=<?php echo $new_arrival; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?php if ($current_page >= $total_pages) echo 'disabled'; ?>">
                    <a class="page-link" href="../supermanager/S_index.php?page=<?php echo $current_page + 1; ?>&search=<?php echo urlencode($search); ?>&featured=<?php echo $featured; ?>&new_arrival=<?php echo $new_arrival; ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>