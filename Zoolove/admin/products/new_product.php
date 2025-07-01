<?php
include "../includes/check_user.php";
require_once('../includes/db_connect.php');

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $image = $_FILES['image']['name'];
  $color = $_POST['color'];
  $category = $_POST['category'];
  $new = (isset($_POST['new']) && $_POST['new'] == 'on') ? 1 : 0;
  $stock = $_POST['stock'];
  if ($image != "") {
    $target_dir = "../images/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    $image_url = "http://" . $_SERVER["SERVER_NAME"] . "/images/" . basename($image);
  } else {
    $image_url = $_POST['current_image'];
  }
  $sql = "insert into products (name,description,price,image,category,stock,new,color) 
  VALUES ('$name','$description', '$price', '$image_url','$category','$stock','$new','$color')";
  if ($conn->query($sql) === TRUE) {
    echo "<div class='alert alert-success'>Produsul a fost introdus cu succes.</div>";
  } else {
    error_log($conn->error . "\n", 3, "/opt/lampp/htdocs/debug.log");
    echo "<div class='alert alert-danger'>A apărut o eroare la introducerea produsului produsului: " . $conn->error . "</div>";
  }
}
