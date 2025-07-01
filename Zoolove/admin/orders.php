<?php 
    include "includes/check_user.php";
    include "includes/header.php";
    require_once('includes/db_connect.php');
?>
<div class="container mt-5">
    <h2>Comenzi</h2>
    <div class="row">
        <?php

        $sql = "SELECT * FROM orders";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Comanda #<?php echo $row['id']; ?></h5>
                        <p class="card-text">Data: <?php echo $row['order_date']; ?></p>
                        <p class="card-text">Total: <?php echo $row['total']; ?> lei</p>
                        <p class="card-text">Status: <?php echo $row['status']; ?></p>
                        <a href="javascript:loadPage('view_order.php?id=<?php echo $row['id']; ?>')" class="btn btn-primary"><i class="fas fa-eye"></i> Vizualizare</a>
                        <a href="javascript:delete_order({id:'<?php echo $row['id']; ?>'})" class="btn btn-danger"><i class="fas fa-trash"></i> Ștergere</a>
                    </div>
                </div>
            </div>
            <?php
        }
        mysqli_close($conn);
        ?>
    </div>
</div>
<?php include "includes/footer.php" ?>