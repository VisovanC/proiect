<?php
session_start();
require_once('includes/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to get user from database
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];
        
        // Verify password against stored hash
        if (password_verify($password, $stored_password)) {
            $_SESSION['admin_username'] = $username;
            $_SESSION['admin_id'] = $row["id"];
            header('Location: index.php');
            exit();
        } else {
            // Invalid password
            $_SESSION['error'] = "Invalid username or password";
            header('Location: form_login.php');
            exit();
        }
    } else {
        // User not found
        $_SESSION['error'] = "Invalid username or password";
        header('Location: form_login.php');
        exit();
    }
    
    $conn->close();
}
?>