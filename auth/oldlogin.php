<?php
session_start();

require('../php/db.php');
$error = '';

if (isset($_POST['ok'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $valid_login = false;

    $enc_pass = md5($pass);

    $query = "SELECT * FROM users WHERE `email` = '$email' AND `password` = '$enc_pass'";
    $users = mysqli_query($connect, $query) or die('Error in connection query');
    $record = mysqli_fetch_assoc($users);

    if ($record) {
        if ($record['is_verified'] == 0) {
            $_SESSION['email'] = $email;
            header('Location: verify.php?email=' . $email);
            exit;
        }

        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $record['id'];
        $_SESSION['name'] = $record['username'];
        $_SESSION['email'] = $record['email'];
        $_SESSION['role'] = $record['role'];

        $user_id = $record['id'];
        $login_success = mysqli_query($connect, "UPDATE users SET `is_loggedin` = 1 WHERE id = '$user_id'") or die('Error user id');
        $valid_login = true;
    } else {
        $error = 'Your account does not exist or is not verified.';
    }

    if ($valid_login) {
        switch ($_SESSION['role']) {
            case ('super_manager'):
                echo 'You are a great Super Manager Dear: ' . $_SESSION['name'];
                header('Location: ../supermanager/S_index.php?role=' . $_SESSION['role']);
                break;
            case ('manager'):
                echo 'You are a great Manager Dear: ' . $_SESSION['name'];
                header('Location: ../manager/M_index.php?role=' . $_SESSION['role']);
                break;
            case ('admin'):
                echo 'You are a great Admin Dear: ' . $_SESSION['name'];
                header('Location: ../admin/A_index.php?role=' . $_SESSION['role']);
                break;
            case ('user'):
                echo 'You are a valued user Dear ' . $_SESSION['name'];
                header('Location: ../main/index.php?role=' . $_SESSION['role']);
                break;
        }
        exit;
    } else {
        $error = 'Invalid email or password. Please try again.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../scss/style.css">
</head>

<body class="login_container">
    <div class="container-flex ">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if ($error) : ?>
                    <div class="alert alert-danger"><?php echo $error ?></div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="POST">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" class="form-control" name="pass" required>
                            </div>
                            <button type="submit" class="btn button_Coral flex-center btn-block" name="ok">Login</button>
                            <a href="register.php" class="btn btn-link">Register</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>