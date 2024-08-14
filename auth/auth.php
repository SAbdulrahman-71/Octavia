<?php
session_start();
require('../php/db.php');


$message = '';

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Common validation and security steps
    if (empty($email) || empty($password)) {
        $message = 'Email and password are required.';
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // password_hash for better security

        if ($action === 'login') {
            $query = "SELECT * FROM users WHERE `email` = '$email'";
            $result = mysqli_query($connect, $query);
            $record = mysqli_fetch_assoc($result);

            if ($record && password_verify($password, $record['password'])) {
                if ($record['is_verified'] == 0) {
                    $_SESSION['email'] = $email;
                    header('Location: ../auth/verify.php?email=' . urlencode($email));
                    exit;
                }

                $_SESSION['loggedin'] = true;
                $_SESSION['user_id'] = $record['id'];
                $_SESSION['name'] = $record['username'];
                $_SESSION['email'] = $record['email'];
                $_SESSION['role'] = $record['role'];

                // Update user login status
                mysqli_query($connect, "UPDATE users SET `is_loggedin` = 1 WHERE id = '{$record['id']}'");

                switch ($_SESSION['role']) {
                    case 'super_manager':
                        header('Location: ../supermanager/S_index.php?role=' . $_SESSION['role']);
                        break;
                    case 'manager':
                        header('Location: ../manager/M_index.php?role=' . $_SESSION['role']);
                        break;
                    case 'admin':
                        header('Location: ../admin/A_index.php?role=' . $_SESSION['role']);
                        break;
                    case 'user':
                        header('Location: ../main/Home.php?role=' . $_SESSION['role']);
                        break;
                }
                exit;
            } else {
                $message = 'Invalid email or password. Please try again.';
            }
        } elseif ($action === 'register') {
            $username = $_POST['username'];
            $password_2 = $_POST['password_2'];

            if ($password !== $password_2) {
                $message = 'Passwords do not match.';
            } else {
                $verification_code = rand(11111111, 99999999);

                $query = "INSERT INTO users (`username`, `email`, `password`, `verification_code`) VALUES ('$username', '$email', '$hashed_password', '$verification_code')";
                if (mysqli_query($connect, $query)) {
                    $message = 'Account successfully created! Please check your email to verify.';
                    $_SESSION['email'] = $email;
                    header('Location: ../auth/verify.php?email=' . urlencode($email));
                    exit;
                } else {
                    $message = 'Error creating account: ' . mysqli_error($connect);
                }
            }
        } else {
            $message = 'Invalid action specified.';
        }
    }
}
