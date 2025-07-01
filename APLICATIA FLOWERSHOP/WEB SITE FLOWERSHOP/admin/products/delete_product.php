<?php
include "../includes/check_user.php";
require_once('../includes/db_connect.php');
if (isset($_POST['id']) && !empty($_POST['id'])) {
  $id = $_POST['id'];
  $sql = "DELETE from products WHERE id=$id";
  if ($conn->query($sql) === TRUE) {
    echo "<div class='alert alert-success'>Produsul a fost actualizat cu succes.</div>";
  } else {
    echo "<div class='alert alert-danger'>A apărut o eroare la actualizarea produsului: " . $conn->error . "</div>";
  }
}