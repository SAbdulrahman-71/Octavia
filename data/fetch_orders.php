<?php
// Adjust the path to db.php
include('/xampp/htdocs/Octavia/php/db.php');

$product_sql = "SELECT * FROM orders";
$product_result = $connect->query($product_sql);

$inventory = array();
if ($product_result->num_rows > 0) {
    while ($row = $product_result->fetch_assoc()) {
        $category = $row['category'];
        if (!isset($inventory[$category])) {
            $inventory[$category] = array();
        }
        $inventory[$category][] = $row;
    }
}
