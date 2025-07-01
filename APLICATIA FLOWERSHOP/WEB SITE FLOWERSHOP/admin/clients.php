<?php
include "includes/check_user.php";
include "includes/header.php";
require_once('includes/db_connect.php');
$sql = "SELECT * FROM clients";
$result = $conn->query($sql);

$conn->close();
?>
<div class="container">
	<div class="d-flex flex-row justify-content-between">
		<h2>Produse</h2>
		<h3><a href="javascript:loadPage('products/new_product_view.php')"><i class="fa-regular fa-plus"></i></a></h3>
	</div>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nume</th>
				<th>Prenume</th>
				<th>Adresa</th>
				<th>Telefon</th>
				<th>Email</th>
				<th>Acțiuni</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = $result->fetch_assoc()) : ?>
				<tr>
					<td><?php echo $row['last_name']?></td>
					<td><?php echo $row['first_name'];; ?></td>
					<td><?php echo $row['address']; ?></td>
          <td><?php echo $row['phone']; ?></td>
          <td><?php echo $row['email']; ?></td>
					<td>
						<a href="javascript:delete_client(<?php echo $row['id']; ?>)" class="btn btn-outline-danger"><i class="material-icons">delete</i></a>
					</td>
				</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
</div>
<?php include "includes/footer.php" ?>