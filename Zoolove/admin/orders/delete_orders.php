<?php
include "../includes/check_user.php";
require_once('../includes/db_connect.php');

if (isset($_POST['order_id']) && !empty($_POST['order_id'])) {
  $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
  
  // First delete order items
  $sql = "DELETE FROM order_items WHERE order_id='$order_id'";
  if ($conn->query($sql) === TRUE) {
    // Then delete the order
    $sql = "DELETE FROM orders WHERE id='$order_id'";
    if ($conn->query($sql) === TRUE) {
      echo "<div class='alert alert-success'>Comanda a fost ștearsă cu succes.</div>";
    } else {
      echo "<div class='alert alert-danger'>A apărut o eroare la ștergerea comenzii: " . $conn->error . "</div>";
    }
  } else {
    echo "<div class='alert alert-danger'>A apărut o eroare la ștergerea articolelor comenzii: " . $conn->error . "</div>";
  }
}
?>