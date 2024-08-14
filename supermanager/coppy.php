<?php
session_start();

// Include necessary files
require('../php/header.php');
require('../php/footer.php');
require('../data/fetch_inventory.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Artisté</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="/scss/styles.css"> -->
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }

        /* Hero Section */
        .hero {
            background-image: url('/path/to/hero-background.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
            padding: 5rem 0;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 0.5rem;
        }

        .hero p {
            font-size: 1.25rem;
        }

        /* Featured Products */
        .product-card {
            border: 1px solid #ddd;
            border-radius: 0.25rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .product-card img {
            border-bottom: 1px solid #ddd;
            border-radius: 0.25rem 0.25rem 0 0;
        }

        /* Category Cards */
        .category-card {
            border: 1px solid #ddd;
            border-radius: 0.25rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .category-card img {
            border-bottom: 1px solid #ddd;
        }

        .category-info {
            padding: 1rem;
        }

        .category-info h4 {
            margin-bottom: 0.5rem;
        }

        .category-info p {
            margin-bottom: 1rem;
        }

        /* Promotion Cards */
        .promotion-card {
            border: 1px solid #ddd;
            border-radius: 0.25rem;
            overflow: hidden;
        }

        .promotion-card img {
            border-bottom: 1px solid #ddd;
        }

        .promotion-info {
            padding: 1rem;
        }

        .promotion-info h4 {
            margin-bottom: 0.5rem;
        }

        .promotion-info p {
            margin-bottom: 1rem;
        }

        /* Button Styling */
        .btn {
            border-radius: 0.25rem;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-light {
            background-color: #fff;
            color: #007bff;
            border: 1px solid #007bff;
        }

        .btn-light:hover {
            background-color: #f8f9fa;
        }

        /* Container Styling */
        .container-fluid {
            padding: 0 15px;
        }
    </style>
</head>

<body>
    <?php include('../php/header.php'); ?>

    <!-- Hero Section -->
    <div class="hero bg-primary text-white text-center py-5">
        <h1>Welcome to Artisté</h1>
        <p>Your destination for exquisite flowers, perfumes, gifts, chocolates, and watches.</p>
        <a href="display.php?category=All" class="btn btn-light btn-lg">Shop Now</a>
    </div>

    <!-- Featured Products Section -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Featured Products</h2>
        <div class="row">
            <?php
            // Display some featured products from different categories
            $featuredProducts = [
                // Sample data - replace with actual product IDs or queries
                ['id' => 1, 'name' => 'Elegant Rose Bouquet', 'price' => 50, 'img' => 'path/to/flower.jpg'],
                ['id' => 2, 'name' => 'Luxurious Perfume', 'price' => 120, 'img' => 'path/to/perfume.jpg'],
                ['id' => 3, 'name' => 'Handcrafted Chocolate', 'price' => 30, 'img' => 'path/to/chocolate.jpg'],
                ['id' => 4, 'name' => 'Classic Watch', 'price' => 250, 'img' => 'path/to/watch.jpg'],
            ];

            foreach ($featuredProducts as $product) {
                echo <<<HTML
                <div class="col-md-3 mb-4">
                    <div class="card product-card h-100">
                        <img src="{$product['img']}" alt="{$product['name']}" class="card-img-top img-fluid" loading="lazy">
                        <div class="card-body text-center">
                            <h5 class="card-title">{$product['name']}</h5>
                            <p class="card-text"><strong>Price:</strong> {$product['price']} AED</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="display.php?product={$product['id']}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                HTML;
            }
            ?>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Explore Our Categories</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="category-card">
                    <img src="path/to/flowers.jpg" alt="Flowers" class="img-fluid">
                    <div class="category-info text-center py-3">
                        <h4>Flowers</h4>
                        <p>Discover our beautiful selection of flowers.</p>
                        <a href="display.php?category=Flowers" class="btn btn-outline-primary">Shop Flowers</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="category-card">
                    <img src="path/to/perfumes.jpg" alt="Perfumes" class="img-fluid">
                    <div class="category-info text-center py-3">
                        <h4>Perfumes</h4>
                        <p>Find the perfect fragrance for any occasion.</p>
                        <a href="display.php?category=Perfumes" class="btn btn-outline-primary">Shop Perfumes</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="category-card">
                    <img src="path/to/gifts.jpg" alt="Gifts" class="img-fluid">
                    <div class="category-info text-center py-3">
                        <h4>Gifts</h4>
                        <p>Surprise your loved ones with unique gifts.</p>
                        <a href="display.php?category=Gifts" class="btn btn-outline-primary">Shop Gifts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Promotions Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Special Promotions</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="promotion-card">
                        <img src="path/to/sale.jpg" alt="Sale" class="img-fluid">
                        <div class="promotion-info text-center py-3">
                            <h4>Summer Sale</h4>
                            <p>Up to 50% off on selected items.</p>
                            <a href="display.php?category=Sale" class="btn btn-primary">Shop Sale</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="promotion-card">
                        <img src="path/to/new-arrivals.jpg" alt="New Arrivals" class="img-fluid">
                        <div class="promotion-info text-center py-3">
                            <h4>New Arrivals</h4>
                            <p>Check out the latest additions to our collection.</p>
                            <a href="display.php?category=New Arrivals" class="btn btn-primary">Shop New Arrivals</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('../php/footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>