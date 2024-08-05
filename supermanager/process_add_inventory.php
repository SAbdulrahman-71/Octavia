<?php
// Include database connection
include '../php/db.php'; // Assuming your connection script is named db_connect.php

// Get data from POST request
$category = mysqli_real_escape_string($connect, $_POST['category']);
$brand = mysqli_real_escape_string($connect, $_POST['brand']);
$name = mysqli_real_escape_string($connect, $_POST['name']);
$price = floatval($_POST['price']);
$occasion = mysqli_real_escape_string($connect, $_POST['occasion']);
$img = mysqli_real_escape_string($connect, $_POST['img']);
$description = mysqli_real_escape_string($connect, $_POST['description']);

// Insert new item into the database
$query = "INSERT INTO inventory (category, brand, name, price, occasion, img, description) VALUES ('$category', '$brand', '$name', $price, '$occasion', '$img', '$description')";
if (mysqli_query($connect, $query)) {
    echo 'Item added successfully.';
} else {
    echo 'Error adding item: ' . mysqli_error($connect);
}

// Redirect back to the inventory page
header('Location: inventory.php');
exit;
