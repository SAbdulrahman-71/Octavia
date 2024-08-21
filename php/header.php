<?php
// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Function to check if the current page is active
if (!function_exists('isActive')) {
    function isActive($page)
    {
        return basename($_SERVER['PHP_SELF']) == $page ? 'active' : '';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../scss/style.css">
    <script src="https://kit.fontawesome.com/5b71452b8d.js" crossorigin="anonymous"></script>
    <style>
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar-nav .nav-link {
            margin-right: 1rem;
        }

        .navbar-nav .btn {
            margin-top: 0.5rem;
            margin-right: 1rem;
        }
    </style>
</head>

<body>
    <header>
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Artisté</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fa-solid fa-bars"></i>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <?php
                        if (isset($_SESSION['role'])) {
                            switch ($_SESSION['role']) {
                                case 'super_manager':
                                    echo '<li class="nav-item ' . isActive('S_index.php') . '">
                                            <a class="nav-link" href="../supermanager/S_index.php">Super Manager</a>
                                          </li>';
                                    break;
                                case 'manager':
                                    echo '<li class="nav-item ' . isActive('M_index.php') . '">
                                            <a class="nav-link" href="../manager/M_index.php">Manager</a>
                                          </li>';
                                    break;
                                case 'admin':
                                    echo '<li class="nav-item ' . isActive('A_index.php') . '">
                                            <a class="nav-link" href="../admin/A_index.php">Admin</a>
                                          </li>';
                                    break;
                                default:
                                    break;
                            }
                        }
                        ?>
                        <li class="nav-item <?php echo isActive('home.php'); ?>">
                            <a class="nav-link" href="../main/home.php">Home</a>
                        </li>
                        <li class="nav-item <?php echo isActive('about.php'); ?>">
                            <a class="nav-link" href="../main/about.php">About</a>
                        </li>
                        <li class="nav-item <?php echo isActive('Display.php'); ?>">
                            <a class="nav-link" href="../main/Display.php">Products</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <button class="btn" data-toggle="modal">

                                <a href="../main/profile.php">
                                    <i class="fa-solid fa-user"></i>
                                </a>

                            </button>
                        </li>
                        <li class="nav-item <?php echo isActive('logout.php'); ?>">
                            <a class="nav-link" href="../auth/logout.php">Log Out</a>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#cartModal">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>