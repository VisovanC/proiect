<?php
include "includes/header.php";
include "includes/nav.php";
require_once('includes/db_connect.php');
include "includes/check_user.php";
?>
<div class="container mt-5">
  <div class="d-flex justify-content-between">
    <h1>Bine ai venit utilizatorule: <?php echo $_SESSION['username'] ?></h1>
    <a href="logout.php">Logout</a>
  </div>
  <div class="card mb-5">
    <h2 class="card-header">Informatii client</h2>
    <div class="card-body">
      <table class="table">
        <tbody>
          <?php
          $user_id = $_SESSION['user_id'];
          $sql = "SELECT * FROM clients where id=$user_id";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc() ?>
            <tr>
              <td>Nume</td>
              <td><?php echo $row['last_name']; ?></td>
            </tr>
            <tr>
              <td>Prenume</td>
              <td><?php echo $row['first_name']; ?></td>
            </tr>
            <tr>
              <td>Adresa</td>
              <td><?php echo $row['address']; ?></td>
            </tr>
            <tr>
              <td>Email</td>
              <td><?php echo $row['email']; ?></td>
            </tr>
            <td>Telefon</td>
            <td><?php echo $row['phone']; ?></td>
            </tr>
            <tr>
            <?php }; ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="card mt-5">
    <h2 class="card-header">Comenzile mele</h2>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Comanda</th>
            <th scope="col">Data</th>
            <th scope="col">Total</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $user_id = $_SESSION['user_id'];
          $sql = "SELECT * FROM orders where user_id=$user_id";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['order_date']; ?></td>
                <td><?php echo $row['total']; ?> lei</td>
                <td><?php echo $row['status']; ?></td>
                <td><a href="view_order.php?id=<?php echo $row['id']; ?>"><i class="fas fa-eye"></i></a>
                </td>
              </tr>
          <?php
            };
          };
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include "includes/footer.php" ?>