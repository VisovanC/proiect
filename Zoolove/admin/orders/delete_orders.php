<?php
include "../includes/check_user.php";
require_once('../includes/db_connect.php');

if (
  isset($_POST['order_id']) && !empty($_POST['order_id'])
) {
  $order_id = $_POST['order_id'];
  $sql = "delete from order_items WHERE order_id=$order_id";
  if ($conn->query($sql) === TRUE) {
    $sql = "delete from orders WHERE id=$order_id";
    if ($conn->query($sql) === TRUE) {
      echo "<div class='alert alert-success'>Comanda a fost stearsa cu succes.</div>";
    } else {
      echo "<div class='alert alert-danger'>A apărut o eroare la stergerea comenzii: " . $conn->error . "</div>";
    }
  } else {
    echo "<div class='alert alert-danger'>A apărut o eroare la stergerea comenzii: " . $conn->error . "</div>";
  }
}
