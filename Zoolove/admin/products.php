<?php
include "includes/check_user.php";
include "includes/header.php";
require_once('includes/db_connect.php');
$sql = "SELECT * FROM products";
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
				<th>ID</th>
				<th>Imagine</th>
				<th>Nume produs</th>
				<th>Descriere</th>
				<th>Preț</th>
				<th>Acțiuni</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = $result->fetch_assoc()) : ?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td>
						<img class="image-thumbnail" style="width:5em;" src="<?php echo $row['image']; ?>">
					</td>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['description']; ?></td>
					<td><?php echo $row['price']; ?></td>
					<td>
						<a href="javascript:loadPage('products/edit_product_view.php?id=<?php echo $row['id']; ?>')" class="btn btn-outline-primary"> <i class="material-icons">edit</i></a>
						<a href="javascript:deleteProduct(<?php echo $row['id']; ?>)" class="btn btn-outline-danger"><i class="material-icons">delete</i></a>
					</td>
				</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
</div>
<?php include "includes/footer.php" ?>