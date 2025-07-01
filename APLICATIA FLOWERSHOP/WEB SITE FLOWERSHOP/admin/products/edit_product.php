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
  $new = ($_POST['new'] == 'on') ? 1 : 0;
  $stock = $_POST['stock'];

  if ($image != "") {
    $target_dir = "../images/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    $image_url = "http://" . $_SERVER["SERVER_NAME"] . "/images/" . basename($image);
  } else {
    $image_url = $_POST['current_image'];
  }

  $sql = "UPDATE products SET name='$name', description='$description', price='$price', 
  image='$image_url', color='$color', new='$new',
  stock='$stock', category='$category' WHERE id=$id";
  if ($conn->query($sql) === TRUE) {
    echo "<div class='alert alert-success'>Produsul a fost actualizat cu succes.</div>";
  } else {
    echo "<div class='alert alert-danger'>A apărut o eroare la actualizarea produsului: " . $conn->error . "</div>";
  }
}
