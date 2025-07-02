<?php
require_once('../includes/db_connect.php');
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "Trebuie să fii autentificat pentru a plasa o comandă!";
    exit();
}

// Get cart data
$cart_data = json_decode($_POST['current_order'], true);
if (empty($cart_data)) {
    echo "Coșul de cumpărături este gol!";
    exit();
}

$total = 0;
$user_id = $_SESSION['user_id'];

// Calculate total
foreach($cart_data as $product){
    $total += $product['price'] * $product['quantity'];
}

// Insert order
$sql = "INSERT INTO orders (order_date, status, total, user_id) 
        VALUES (NOW(), 'placed', '$total', $user_id)";

if ($conn->query($sql) === TRUE) {
    $order_id = $conn->insert_id;
    
    // Insert order items
    foreach ($cart_data as $product) {
        $product_id = $product['id'];
        $quantity = $product['quantity'];
        $price = $product['price'];
        
        $sql = "INSERT INTO order_items (order_id, product_id, quantity, price)
                VALUES ($order_id, $product_id, $quantity, $price)";
        
        if ($conn->query($sql) !== TRUE) {
            echo "Eroare la inserarea articolelor comenzii: " . $conn->error;
            exit();
        }
    }
    
    echo "Comanda a fost plasată cu succes!";
    $_SESSION['current_order'] = [];
} else {
    echo "Eroare la inserarea comenzii: " . $conn->error;
}

$conn->close();
?>