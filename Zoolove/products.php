<?php
session_start();
require_once('includes/db_connect.php');
include "includes/header.php"
?>
<?php include "includes/nav.php" ?>

<div class="container mt-2">
	<?php include "filters.php" ?>
	<div class="row">
		<?php
		$colorFilter = "";
		$sql = "SELECT products.*, categories.name AS category_name FROM products
            INNER JOIN categories ON products.category = categories.id 
            INNER JOIN color on products.color = color.id";
		$filters = "";
		if (
			isset($_POST["filter-category"]) &&
			!empty($_POST["filter-category"])
		) {
			$filters = " where categories.name ='" . $_POST["filter-category"] . "'";
		}
		if (
			isset($_POST["filter-price"])
			&& !empty($_POST["filter-price"])
		) {
			$price_arr = explode("-", $_POST["filter-price"]);
			$condition = empty($filters) ? " where " : ' and ';
			$filters = $filters . $condition . " price < " . $price_arr[1] . " and price > " . $price_arr[0];
		}
		if (
			isset($_POST["filter-color"]) &&
			!empty($_POST["filter-color"])
		) {
			$condition = empty($filters) ? " where " : ' and ';
			$filters = $filters . $condition . " color.color ='" . $_POST["filter-color"] . "'";
		}
		$sql = $sql . $filters;
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
		?>
				<div class="col-md-4">
					<div class="card border-0 fls-product-card">
						<img class="product_image card-img-top" src=<?php echo $row["image"]; ?> data-toggle="modal" data-target="#productModal" data-id="<?php echo $row["id"]; ?>" />
						<div class="card-body ">
							<h5 class="card-title"><?php echo $row["name"]; ?></h5>
							<p class="card-text">RON <?php echo $row["price"]; ?></p>
						</div>
						<div class="fls-product-icon-action d-flex justify-content-center flex-column">
							<a href="" class="fls-product-button">
								<i class="fa-regular fa-heart"></i>
							</a>
							<a href="javascript:addToCart(
                                {
                                    id:<?php echo $row["id"]; ?>,
                                    price:<?php echo $row["price"]; ?>
                                })" class="fls-product-button">
								<i class="fa-solid fa-cart-shopping"></i>
							</a>
							<a href="" class="fls-product-button">
								<i class="fa-sharp fa-solid fa-magnifying-glass"></i>
							</a>
						</div>
					</div>
				</div>
		<?php
			}
		} else {
			echo "Nu există produse în baza de date.";
		}
		$conn->close();
		?>

	</div>
</div>
<?php include "product.php" ?>
<?php include "includes/footer.php" ?>