<?php
// Start the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Function to check if the current page is active
// Check if the function is already defined
if (!function_exists('isActive')) {
    function isActive($page)
    {
        return basename($_SERVER['PHP_SELF']) == $page ? 'active' : '';
    }
}

?>

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

<header>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/5b71452b8d.js" crossorigin="anonymous"></script>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Artisté</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <?php
                    if (isset($_SESSION['role'])) {
                        switch ($_SESSION['role']) {
                            case 'super_manager':
                                echo '<li class="nav-item ' . isActive('../supermanager/S_index.php') . '">
                                        <a class="nav-link bg-primary" href="../supermanager/S_index.php">super_manager <span class="sr-only">(current)</span></a>
                                      </li>';
                                break;
                            case 'manager':
                                echo '<li class="nav-item ' . isActive('../manager/M_index.php') . '">
                                        <a class="nav-link bg-success" href="../manager/M_index.php">manager <span class="sr-only">(current)</span></a>
                                      </li>';
                                break;
                            case 'admin':
                                echo '<li class="nav-item ' . isActive('../admin/A_index.php') . '">
                                        <a class="nav-link bg-warning" href="../admin/A_index.php">admin <span class="sr-only">(current)</span></a>
                                      </li>';
                                break;
                            default:
                                break;
                        }
                    }
                    ?>
                    <li class="nav-item <?php echo isActive('index.php'); ?>">
                        <a class="nav-link" href="../main/index.php">Home</a>
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
                            <i class="fa-solid fa-user"></i>
                        </button>
                    </li>
                    <li class="nav-item <?php echo isActive('logout.php'); ?>">
                        <a class="nav-link" href="../auth/logout.php">Log out</a>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#cartModal"><i class="fa-solid fa-cart-shopping"></i></button>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>