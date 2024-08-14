<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$email = $_SESSION['email'];

require('../php/db.php');
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $entered_code = $_POST['verification_code'];

    // Fetch the user data from the database
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connect, $query);
    $user = mysqli_fetch_assoc($result);

    // Check if the user is found and is not verified
    if ($user) {
        if ($user['is_verified'] == 1) {
            $error = 'Your email is already verified.';
        } elseif ($user['verification_code'] == $entered_code) {
            // Update the user to set is_verified = 1
            $update_query = "UPDATE users SET is_verified = 1 WHERE email = '$email'";
            if (mysqli_query($connect, $update_query)) {
                $success = 'Your email has been verified successfully.';
            } else {
                $error = 'Failed to verify your email. Please try again later.';
            }
        } else {
            $error = 'Invalid verification code. Please try again.';
        }
    } else {
        $error = 'User not found. Please ensure you entered the correct email.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>| Verify </title>

<link rel="stylesheet" href="../scss/style.css">
<script src="https://kit.fontawesome.com/5b71452b8d.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<body class="verify-container">
    <div class="pill-1"></div>
    <div class="pill-2"></div>
    <div class="pill-3"></div>
    <div class="pill-4"></div>
    <div class="flower_box1"></div>
    <div class="container card" style="margin:15%">

        <div style=" display: flex;
            justify-content: center;
            align-items: center;">

            <h1>Verify your email: <?php echo htmlspecialchars($email); ?></h1>
        </div>


        <?php if ($error) : ?>
            <h5 style=" color: red;"><?php echo $error; ?>
            </h5>
        <?php endif; ?>

        <?php if ($success) : ?>
            <div style="color: green;"><?php echo $success; ?>
                <a href="../main/index.php" class="btn btn-link">Back to login</a>
            </div>
        <?php else : ?>
            <form method="post" action="verify.php">

                <div class="row">
                    <p class="col" for="verification_code">Enter your verification code:</p>
                    <input type="text" id="verification_code" name="verification_code" required>
                    <button class="col " type=" submit" class="btn btn-block">Verify</button>
                </div>
            </form>
        <?php endif; ?>

    </div>


</body>

</html>