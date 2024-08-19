<?php
include('../auth/auth.php');
// include('../auth/verify.php');
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Register</title>

    <link rel="stylesheet" href="../scss/style.css">
    <script src="https://kit.fontawesome.com/5b71452b8d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body class="new-login-container">


    <div class="pill-1"></div>
    <div class="pill-2"></div>
    <div class="pill-3"></div>
    <div class="pill-4"></div>
    <div class="flower_box1"></div>

    <!-- Display the message only if it's not empty -->
    <?php if (!empty($message)) : ?>
        <div class="alert <?php echo strpos($message, 'Error') === false ? 'alert-danger' : 'alert-success'; ?>">
            <?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>
        </div>
    <?php endif; ?>

    <div class="container" id=container>
        <div class="form-container sign-up">
            <form action="index.php" method="post">
                <h1>Creat Account</h1>
                <div class="social-icons">
                    <a href="" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="" class="icon"><i class="fa-brands fa-facebook"></i></a>
                    <a href="" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="" class="icon"><i class="fa-brands fa-twitter"></i></a>
                </div>
                <span>or use your email for registration</span>

                <input type="text" placeholder="Name" class="form-control" name="username" id="username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" required>
                <input type="email" placeholder="Email" class="form-control" name="email" id="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                <input type="password" placeholder="Password" class="form-control" name="password" id="password" required>
                <input type="password" placeholder="Confirm Password" class="form-control" name="password_2" id="password_2" required>
                <button type="submit" name="action" value="register">Sign Up</button>
            </form>
        </div>

        <div class="form-container Log-in">
            <form action="index.php" method="post">
                <h1>Log In</h1>
                <div class="social-icons">
                    <a href="" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="" class="icon"><i class="fa-brands fa-facebook"></i></a>
                    <a href="" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="" class="icon"><i class="fa-brands fa-twitter"></i></a>
                </div>
                <span>or use your email & password for Log in</span>
                <input type="email" placeholder="Email" class="form-control" name="email" required>
                <input type="password" placeholder="Password" class="form-control" name="password" required>
                <button type="submit" name="action" value="login">Login</button>
                <a href="index.php">Forgot Password</a>

            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-pannel toggle-left">
                    <h1>Hello!</h1>
                    <p>Choose the method to creact your Account</p>
                    <p>OR</p>
                    <button class="hidden" id="login">Log-In</button>
                </div>

                <div class="toggle-pannel toggle-right">
                    <h1>Welcome Back!</h1>
                    <p>Enter Your Email & Password</p>
                    <p>OR</p>
                    <button class="hidden" id="register">Sign-Up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/sign_toggles.js"></script>
</body>

</html>