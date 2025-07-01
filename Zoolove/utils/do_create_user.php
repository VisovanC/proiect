<?php
require_once('../includes/db_connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['username'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		$sql = "SELECT * FROM clients WHERE username='$username'";
		$result = $conn->query($sql);
		if ($result->num_rows == 1) {
      header('Location: ../create_user.php');
		exit();
	}else{
    $sql = "insert into clients (first_name, last_name, address, phone, email,username,password) 
    VALUES('$first_name','$last_name','$address','$phone','$email','$username','$hashed_password')";
		$result = $conn->query($sql);
  };	
}
}
header('Location: ../login.php');
?>