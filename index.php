<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="/scss/style.css">
    <?php require('./php/products.php') ?>

    <header>
        <nav class="nav_container">
            <ul class="nav text-center">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Log in</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="products.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_cart.php">View Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log out</a>
                </li>
            </ul>
        </nav>

    </header>
</head>

<body class="container">
    <div class="card">
        <h1>Welcome to Octavia </h1>

    </div>

    <pre> <?php print_r($products) ?></pre>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <div class="card_box">

        <h1>hello</h1>
    </div>

    <div class="card_box">

        <img src="/src/images/flower-4148439_1280.png" alt="nice flower">

    </div>
</body>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>