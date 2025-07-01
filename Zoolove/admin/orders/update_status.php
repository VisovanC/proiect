<?php
include "../includes/check_user.php";
require_once('../includes/db_connect.php');

if (
  isset($_POST['order_id']) && !empty($_POST['order_id'])
  && isset($_POST['order_status']) && !empty($_POST['order_status'])
) {

  $order_id = $_POST['order_id'];
  $order_status = $_POST['order_status'];
  $sql = "update orders set status='$order_status' WHERE id=$order_id";
  if ($conn->query($sql) === TRUE) {
    echo "<div class='alert alert-success'>Statusul comenzii a fost actualizat cu succes.</div>";
  } else {
    echo "<div class='alert alert-danger'>A apărut o eroare la schimbarea statusului comenzii: " . $conn->error . "</div>";
  }
}
