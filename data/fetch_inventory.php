<?php
include('/xampp/htdocs/Octavia/php/db.php');

$product_sql = "SELECT * FROM inventory";
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



$product_sql = "SELECT * FROM inventory_promotion";
$product_result = $connect->query($product_sql);

$inventory_promotion = array();
if ($product_result->num_rows > 0) {
    while ($row = $product_result->fetch_assoc()) {
        $inventory_id = $row['inventory_id'];
        if (!isset($inventory[$inventory_id])) {
            $inventory_promotion[$inventory_id] = array();
        }
        $inventory_promotion[$inventory_id][] = $row;
    }
}
