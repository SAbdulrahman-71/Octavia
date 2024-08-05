<?php
include('./php/db.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_2 = $_POST['password_2'];

    // Check if passwords match
    if ($password !== $password_2) {
        $error = 'Password does not match';
        // Output error and stop script execution
        echo $error;
        exit;
    }

    // Check if email is empty
    if (empty($email)) {
        $error = 'Email cannot be empty';
        // Output error and stop script execution
        echo $error;
        exit;
    }

    // Generate verification code
    $verification_code = rand(11111111, 99999999);

    // Encrypt password using md5 (not recommended for production use)
    $encrypted_pass = md5($password);

    // SQL query to insert user into the database
    $query = "INSERT INTO users (`username`, `email`, `password`, `verification_code`) 
              VALUES ('$username', '$email', '$encrypted_pass', '$verification_code')";

    // Execute the query and check for errors
    $store = mysqli_query($connect, $query) or die('Error in the query');

    // Provide feedback to the user
    if ($store) {
        $success = 'Created a new record';
        // header('Location: verify.php?email=' . $email);
        echo $success;
        exit;
    } else {
        $error = 'Error in the query';
        echo $error;
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <h3>Register an account</h3>
        <div class="alert <?php echo isset($success) ? 'alert-success' : ''; ?> <?php echo isset($error) ? 'alert-danger' : ''; ?>">
            <?php echo isset($error) ? $error : ''; ?>
            <?php echo isset($success) ? $success : ''; ?>
        </div>
        <form action="register.php" method="post">
            <div class="form-group">
                <label for="username">Name</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="password_2">Confirm Password</label>
                <input type="password" class="form-control" name="password_2" id="password_2" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>