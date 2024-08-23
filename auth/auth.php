<?php
session_start();
require('../php/db.php');

$message = '';

if (isset($_POST['action'])) {
    // Set what has been posted from index.php
    $action = $_POST['action'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $message = 'Email and password are required.';
    } else {
        if ($action === 'login') {
            // Prepare a SQL statement to prevent SQL injec
            $stmt = $connect->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $record = $result->fetch_assoc();

            if ($record && password_verify($password, $record['password'])) {
                // Check if the user is verified or not
                if ($record['is_verified'] == 0) {
                    $_SESSION['email'] = $email;
                    header('Location: ../auth/verify.php?email=' . urlencode($email));
                    exit;
                }


                // Set the session values of this user
                $_SESSION['loggedin'] = true;
                $_SESSION['user_id'] = $record['id'];
                $_SESSION['name'] = $record['username'];
                $_SESSION['email'] = $record['email'];
                $_SESSION['role'] = $record['role'];

                // Update user login status securely
                $update_stmt = $connect->prepare("UPDATE users SET is_loggedin = 1 WHERE id = ?");
                $update_stmt->bind_param("i", $record['id']);
                $update_stmt->execute();

                // Redirect based on user role
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
                $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password securely
                $verification_code = rand(11111111, 99999999);

                // Prepare an insert query to prevent SQL injection
                $stmt = $connect->prepare("INSERT INTO users (username, email, password, verification_code) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("sssi", $username, $email, $hashed_password, $verification_code);

                if ($stmt->execute()) {
                    $message = 'Account successfully created! Please check your email to verify.';
                    $_SESSION['email'] = $email;
                    header('Location: ../auth/verify.php?email=' . urlencode($email));
                    exit;
                } else {
                    $message = 'Error creating account: ' . $connect->error;
                }
            }
        } else {
            $message = 'Invalid action specified.';
        }
    }
}
