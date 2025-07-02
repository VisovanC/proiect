<?php
require_once('../includes/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = $_POST['password'];
        
        // Query to get user from database
        $sql = "SELECT * FROM clients WHERE username='$username'";
        $result = $conn->query($sql);
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $stored_password = $row['password'];
            
            // Verify password against stored hash
            if(password_verify($password, $stored_password)){
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $row['id'];
                header('Location: ../user_page.php');
                exit();
            } else {
                // Invalid password
                session_start();
                $_SESSION['error'] = "Username sau parolă incorectă!";
                header('Location: ../login.php');
                exit();
            }
        } else {
            // User not found
            session_start();
            $_SESSION['error'] = "Username sau parolă incorectă!";
            header('Location: ../login.php');
            exit();
        }
    }
}
session_start();
$_SESSION['error'] = "Vă rugăm completați toate câmpurile!";
header('Location: ../login.php');
?>