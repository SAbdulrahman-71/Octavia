<?php
include 'db.php';

//Fetch Users
$product_sql = "SELECT * FROM users";
$product_result = $connect->query($product_sql);

$products = array();
if ($product_result->num_rows > 0) {
    while ($row = $product_result->fetch_assoc()) {
        $products[] = $row;
    }
}

// // Fetch items
// $item_sql = "SELECT * FROM items";
// $item_result = $connect->query($item_sql);

// $items = array();
// if ($item_result->num_rows > 0) {
//     while ($row = $item_result->fetch_assoc()) {
//         $items[] = $row;
//     }
// }

$connect->close();






// <?php
// include 'connection.php';

// // // Fetch products
// // $product_sql = "SELECT * FROM products";
// // $product_result = $connect->query($product_sql);

// // $products = array();
// // if ($product_result->num_rows > 0) {
// //     while ($row = $product_result->fetch_assoc()) {
// //         $products[] = $row;
// //     }
// // }

// // // Fetch items
// // // define where clause 
// // // $item_sql = "SELECT * FROM items";

// // $item_sql = "SELECT * FROM items WHERE product_id = '' ";
// // $item_result = $connect->query($item_sql);

// // $items = array();
// // if ($item_result->num_rows > 0) {
// //     while ($row = $item_result->fetch_assoc()) {
// //         $items[] = $row;
// //     }
// // }


// /* $products = "SELECT p.*, i.* FROM products p INNER JOIN items i ON i.product_id = p.id GROUP BY i.product_id";
// $result = $connect->query($products);

// if (mysqli_num_rows($result) > 0) {
    

//     $data = json_encode($result, JSON_UNESCAPED_UNICODE);
//     echo $data;
// } */

// $products = "SELECT * FROM products ORDER BY id DESC";
// $products_res = $connect->query($products);


// if (mysqli_num_rows($products_res) > 0) {
//     $product_ids = [];
//     while ($row = mysqli_fetch_assoc($products_res)) {
//         $product_ids[] = $row['id'];
//         // do what ever wit products
//     }
// }


// if (count($product_ids) > 0) {
//     $items = "SELECT * FROM items WHERE product_id IN ($product_ids) ";
// }


// $connect->close();
