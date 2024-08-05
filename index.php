<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}



require('./php/db.php');
?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCSS Example</title>
    <!-- Link to the compiled CSS file -->
    <link rel="stylesheet" href="/scss/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- require('./data/data.php')  -->

</head>

<body class="container">
    <!-- Header -->
    <header>
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Brand</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Log out</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>




    <!-- Main content -->





    <?php
    // $allowedOccasions = ['Graduation', 'Birthday', 'Anniversary', 'Congratulations', 'Thank You', 'Just Because'];


    $product_sql = "SELECT * FROM inventory";
    $product_result = $connect->query($product_sql);

    $inventory = array();
    if ($product_result->num_rows > 0) {
        while ($row = $product_result->fetch_assoc()) {
            $category = $row['category'];  // Assume 'category' is a column in your table
            if (!isset($inventory[$category])) {
                $inventory[$category] = array();
            }
            $inventory[$category][] = $row;
        }
    }
    ?>

    <div style="margin-top: 10%; margin-bottom:10%">
        <div class="container">
            <?php foreach ($inventory as $categoryName => $products) : ?>
                <div class="card py-2 mb-4">
                    <h2 class="card-header"><?php echo htmlspecialchars($categoryName); ?></h2>
                    <div class="card-body row">
                        <?php foreach ($products as $product) : ?>
                            <div class="card col-md-4 mb-4">
                                <div class="card-body">
                                    <p class="card-title"><strong>Name:</strong> <?php echo htmlspecialchars($product['name']); ?></p>
                                    <p class="card-text"><strong>Description:</strong> <?php echo htmlspecialchars($product['description']); ?></p>
                                    <p class="card-text"><strong>Price:</strong> <?php echo number_format($product['price'], 2); ?> AED</p>
                                    <p class="card-text"><strong>Occasion:</strong> <?php echo htmlspecialchars($product['occasion']); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>




    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 My Website. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>