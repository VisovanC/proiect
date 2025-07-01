<?php
require_once('includes/db_connect.php');
if(isset($_POST['val'])){
    $id = $_POST['val'];
    $sql = "SELECT products.*, categories.name AS category_name FROM products
    JOIN categories ON products.category = categories.id
    where products.id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
}else{
    echo 'Error cannot connect to database';
}
    
?>