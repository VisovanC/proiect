<?php
require_once('../includes/db_connect.php');
session_start();
$products_cart = $_SESSION['current_order'];
$total=0;
foreach($products_cart as $product){
    $total += $product->price * $product->quantity;
}

$user_id = $_SESSION['user_id'];
$sql = "INSERT INTO orders (order_date,status,total,user_id) 
        VALUES (NOW(),'placed','$total',$user_id)";

if ($conn->query($sql) === TRUE) {
    $order_id = $conn->insert_id;
    foreach ($products_cart as $product) {
        $sql = "INSERT INTO order_items (order_id, product_id, quantity, price)
            VALUES
                ($order_id, $product->id, $product->quantity,$product->price)";

        if ($conn->query($sql) === TRUE) {
            echo "Comanda a fost plasată cu succes!";
        } else {
            echo "Eroare la inserarea articolelor comenzii: " . $conn->error;
        }
    }
} else {
    echo "Eroare la inserarea comenzii: " . $conn->error;
}
$conn->close();
$_SESSION['current_order'] = [];
