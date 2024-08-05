<?php
// Database connection settings
$db_host = 'localhost';
$db_name = 'octavia';
$db_user = 'root';
$db_pass = '';


// Create connection to the database
$connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check if the connection is successful
if (!$connect) {
    echo 'Connection failed...';
    exit;
}
