<?php
// Include database connection
include '../php/db.php'; // Assuming your connection script is named db.php


// Check if there's a message to display
$message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : '';


// Fetch users from the database
$query = "SELECT * FROM users";
$result = mysqli_query($connect, $query);

// Check if the query was successful
if (!$result) {
    die('Query failed: ' . mysqli_error($connect));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Manager Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Assuming you have additional custom styles -->
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Manage Users</h1>

        <!-- Users Table -->
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td>
                            <form action="update_role.php" method="post" style="display:inline;">
                                <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                <select name="new_role" class="form-control form-control-sm">
                                    <option value="user" <?php echo $row['role'] == 'user' ? 'selected' : ''; ?>>User</option>
                                    <option value="admin" <?php echo $row['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                                    <option value="manager" <?php echo $row['role'] == 'manager' ? 'selected' : ''; ?>>Manager</option>
                                    <option value="super_manager" <?php echo $row['role'] == 'super_manager' ? 'selected' : ''; ?>>Super Manager</option>
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm mt-2">Update Role</button>
                            </form>
                            <form action="delete_user.php" method="post" style="display:inline;">
                                <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                <button type="submit" class="btn btn-danger btn-sm mt-2" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>



    <?php


    // // Fetch inventory items from the database
    // $query = "SELECT * FROM inventory";
    // $invo = mysqli_query($connect, $query);

    // // Check if the query was successful
    // if (!$invo) {
    //     die('Query failed: ' . mysqli_error($connect));
    // }
    // 
    ?>



    <div class="container my-4">
        <?php if ($message) : ?>
            <div class="alert <?php echo strpos($message, 'Error') === false ? 'alert-success' : 'alert-danger'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <h1 class="mb-4">Manage Inventory</h1>
        <!-- <a href="add_inventory.php" class="btn btn-primary mb-3">Add New Item</a> -->
        <a href="add_multiple_inventory.php" class="btn btn-primary mb-3">Add multiple New Items</a>

        <!-- Bulk Action Form -->
        <form action="bulk_action.php" method="post">
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch inventory items from the database
                        $query = "SELECT * FROM inventory";
                        $result = mysqli_query($connect, $query);

                        if (!$result) {
                            die('Query failed: ' . mysqli_error($connect));
                        }

                        while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td><input type="checkbox" name="items[]" value="<?php echo htmlspecialchars($row['id']); ?>"></td>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['category']); ?></td>
                                <td><?php echo htmlspecialchars($row['brand']); ?></td>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo number_format(htmlspecialchars($row['price']), 2); ?> AED</td>
                                <td><?php echo htmlspecialchars($row['occasion']); ?></td>
                                <td><img src="<?php echo htmlspecialchars($row['img']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" class="img-fluid" style="max-width: 100px;"></td>
                                <td><?php echo htmlspecialchars($row['description']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <!-- Bulk Action Buttons -->
            <div class="form-group">
                <button type="submit" name="action" value="delete" class="btn btn-danger">Delete Selected</button>
                <button type="submit" name="action" value="edit" class="btn btn-warning">Edit Selected</button>
            </div>
        </form>
    </div>








    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>