<?php
session_start();
require_once('includes/db_connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$username = $_POST['username'];
	$password = $_POST['password'];
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);

	$sql = "SELECT * FROM users WHERE username='$username'";
	$result = $conn->query($sql);
	echo $result->num_rows;
	if ($result->num_rows == 1) {
		$row = $result->fetch_assoc();
		$stored_password = $row['password'];
		if (password_verify($password, $hashed_password)) {
			session_start();
			$_SESSION['admin_username'] = $username;
			$_SESSION['admin_id'] = $row["id"];
			header('Location: index.php');
			exit();
		}
	}
	echo "Invalid username or password";
	header('Location: form_login.php');
	$conn->close();
}
