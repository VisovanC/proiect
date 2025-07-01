<?php
include "includes/header.php";
include "includes/nav.php";
require_once('includes/db_connect.php');
include "includes/check_user.php";
?>
<div class="container mt-5">
  <div class="d-flex justify-content-between">
    <h1><?php echo $_SESSION['username'] ?></h1>
    <a href="logout.php">Logout</a>
  </div>
  <div class="card mb-5">
    <h2 class="card-header">Comanda curenta</h2>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Produs</th>
            <th scope="col">Cantitate</th>
            <th scope="col">Pret</th>
            <th></th>
          </tr>
        </thead>
        <?php if (isset($_SESSION['current_order']) && !empty($_SESSION['current_order'])) { ?>
          <tbody>
            <?php
            $products_cart = $_SESSION['current_order'];
            $total = 0;
            foreach ($products_cart as $product) {
              
              $id = $product->id;
              $sql = "SELECT * FROM products where id=$id";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $total += $row['price'] * $product->quantity;
            ?>
                  <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $product->quantity; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><a href="javascript:removeFromCart(<?php echo $row['id'] ?>)"><i class="fa-solid fa-trash text-danger"></i></a></td>
                  </tr>
            <?php }
              }
            } ?>
            <tr>
              <td colspan="2"></td>
              <td>
                <h5>Total: <?php echo $total ?></h5>
              </td>
              <td></td>
            </tr>

          </tbody>
      </table>
      <a href="javascript:placeOrder()" class="btn fls-btn fls-add-chart-btn float-right"><i class="fas fa-eye"></i> Plaseaza comanda</a>
    </div>
  </div>
<?php }; ?>
</div>
<?php include "includes/footer.php" ?>