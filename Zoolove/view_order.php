<?php
include "includes/check_user.php";
include "includes/header.php";
include "includes/nav.php";
require_once('includes/db_connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('Location: user_page.php');
    exit;
}
$sql = "SELECT orders.id as order_id, orders.status, clients.first_name, clients.last_name, clients.address,
    clients.email, products.price, orders.order_date,
    products.name, order_items.quantity
FROM orders
INNER JOIN clients ON orders.user_id = clients.id
INNER JOIN order_items ON orders.id = order_items.order_id
INNER JOIN products ON order_items.product_id = products.id
WHERE orders.id = '$id'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    header('Location: orders.php');
    exit;
}

$order_products = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<div class="container mt-5">
    <h2>Detalii comandă</h2>
    <div class="card mt-3">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5>Comandă #<?php echo $order_products[0]['order_id']; ?></h5>
                <a href="user_page.php" class="btn fls-btn"><i class="fas fa-arrow-left"></i>Back</a>
            </div>
        </div>
        <div class="card-body">
            <p><strong>Nume client:</strong> <?php echo $order_products[0]['last_name'] . " " . $order_products[0]['first_name']; ?></p>
            <p><strong>E-mail client:</strong> <?php echo $order_products[0]['email']; ?></p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Produs</th>
                        <th>Cantitate</th>
                        <th>Preț unitar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($order_products as $product) { ?>
                        <tr>
                            <td><?php echo $product['name'] ?></td>
                            <td><?php echo $product['quantity'] ?></td>
                            <td><?php echo $product['price'] ?> lei</td>
                        </tr>
                    <?php
                        $total += $product['price'] * $product['quantity'];
                    }
                    ?>
                    <tr>
                        <td class="text-right" colspan="2">TOTAL:</td>
                        <td><b><?php echo $total ?> lei</b></td>
                    </tr>
                </tbody>
            </table>
            <p><strong>Adresa de livrare:</strong> <?php echo $order_products[0]['address']; ?></p>
            <p><strong>Data comenzii:</strong> <?php echo $order_products[0]['order_date']; ?></p>
            <p><strong>Status comanda:</strong> <?php echo $order_products[0]['status']; ?></p>

        </div>
    </div>
</div>
<?php include "includes/footer.php" ?>