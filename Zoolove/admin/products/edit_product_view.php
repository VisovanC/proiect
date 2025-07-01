<?php
include "../includes/check_user.php";
if (!isset($_GET['id']) || $_GET['id'] == '') {
    exit();
}
require_once('../includes/db_connect.php');
$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$sql = "SELECT * FROM color";
$result = mysqli_query($conn, $sql);
$sql = "SELECT * FROM categories";
$result_cat = mysqli_query($conn, $sql);
?>
<div class="container mt-5">
    <h2>Editare Produs</h2>
    <form id="edit_product_form">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label for="name">Nume:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
        </div>
        <div class="form-group">
            <label for="description">Descriere:</label>
            <textarea class="form-control" id="description" name="description"><?php echo $row['description']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="price">Pret:</label>
            <input type="text" class="form-control" id="price" name="price" value="<?php echo $row['price']; ?>">
        </div>
        <div class="form-group">
            <label for="stock">Cantitate:</label>
            <input type="text" class="form-control" id="stock" name="stock" value="<?php echo $row['stock']; ?>">
        </div>
        <div class="form-group">
            <label for="color">Culoare:</label>
            <select class="form-control" id="color" name="color">
                <?php
                while ($color = $result->fetch_assoc()) {
                ?>
                    <option value='<?php echo $color['id'] ?>' <?php if ($color['id'] == $row['color']) {
                                                                    echo 'selected';
                                                                }
                                                                ?>>
                        <?php echo $color['color'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="color">Categorie:</label>
            <select class="form-control" id="category" name="category">
                <?php
                while ($category = $result_cat->fetch_assoc()) {
                ?>
                    <option value='<?php echo $category['id'] ?>' <?php if ($category['id'] == $row['category']) {
                                                                        echo 'selected';
                                                                    }
                                                                    ?>>
                        <?php echo $category['name'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" <?php if ($row['new'] == 1) {
                                                                    echo 'checked';
                                                                }
                                                                ?> id="new" name="new">
                <label class="form-check-label" for="new">
                    Produs nou
                </label>
            </div>
        </div>
        <div class="form-group form-inline">
            <label for="image"><img src="<?php echo $row['image']; ?>" class="img-thumbnail" alt="Produs" style="width:5em;"></label>
            <input type="hidden" name=" current_image" value="<?php echo $row['image']; ?>">
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <a class="btn btn-primary" name="submit" onclick="save_product()">Salveaza</a>
        <a href="javascript:loadPage('products.php')" class="btn btn-secondary">Anuleaza</a>
    </form>
</div>