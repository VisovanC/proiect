<?php
include "../includes/check_user.php";
require_once('../includes/db_connect.php');

if (
  isset($_POST['client_id']) && !empty($_POST['client_id'])
) {
  $client_id = $_POST['client_id'];
  $sql = "DELETE FROM order_items WHERE order_id IN (SELECT id FROM orders WHERE user_id = '$client_id')";
  if ($conn->query($sql) === TRUE) {
    $sql = "delete from orders WHERE user_id=$client_id";
    if ($conn->query($sql) === TRUE) {
      $sql = "delete from clients WHERE id=$client_id";
    if ($conn->query($sql) === TRUE) {
      echo "<div class='alert alert-success'>Utilizatorul a fost sters cu succes.</div>";
    } else {
      echo "<div class='alert alert-danger'>A apărut o eroare la stergerea comenzii: " . $conn->error . "</div>";
    }
    } else {
      echo "<div class='alert alert-danger'>A apărut o eroare la stergerea comenzii: " . $conn->error . "</div>";
    }
  } else {
    echo "<div class='alert alert-danger'>A apărut o eroare la stergerea comenzii: " . $conn->error . "</div>";
  }
}
