<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Item</title>
</head>

<body>
    <h1>Add New Inventory Item</h1>
    <form action="process_add_inventory.php" method="post">
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required>
        <label for="brand">Brand:</label>
        <input type="text" id="brand" name="brand" required>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="price">Price:</label>
        <input type="number" step="0.01" id="price" name="price" required>
        <label for="occasion">Occasion:</label>
        <input type="text" id="occasion" name="occasion" required>
        <label for="img">Image URL:</label>
        <input type="text" id="img" name="img" required>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        <button type="submit">Add Item</button>
    </form>
</body>

</html>