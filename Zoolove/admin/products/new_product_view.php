<?php
include "../includes/check_user.php";
require_once('../includes/db_connect.php');
$sql = "SELECT * FROM color";
$result = mysqli_query($conn, $sql);
$sql = "SELECT * FROM categories";
$result_cat = mysqli_query($conn, $sql);
?>
<div class="container mt-5">
    <h2>Adaugare produs</h2>
    <form method="POST" id="add_product_form" enctype="multipart/form-data">
        <input type="hidden" name="id" value="">
        <div class="form-group">
            <label for="name">Nume:</label>
            <input type="text" class="form-control" id="name" name="name" value="" required>
        </div>
        <div class="form-group">
            <label for="description">Descriere:</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Pret:</label>
            <input type="text" class="form-control" id="price" name="price" value="" required>
        </div>
        <div class="form-group">
            <label for="stock">Cantitate:</label>
            <input type="text" class="form-control" id="stock" name="stock" value="" required>
        </div>
        <div class="form-group">
            <label for="color">Culoare:</label>
            <select class="form-control" id="color" name="color">
                <?php
                while ($color = $result->fetch_assoc()) {
                ?>
                    <option value='<?php echo $color['id'] ?>' <?php if ($color['id'] == 1) {
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
                    <option value='<?php echo $category['id'] ?>' <?php if ($category['id'] == 1) {
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
                <input class="form-check-input" type="checkbox" id="new" name="new">
                <label class="form-check-label" for="new">
                    Produs nou
                </label>
            </div>
        </div>
        <div class="form-group form-inline">
            <label for="image"><img src="" class="img-thumbnail" alt="Produs" style="width:5em;"></label>
            <input type="hidden" name=" current_image" value="">
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <a type='submit' class="btn btn-primary" name="submit" onclick="addNewProduct()">Salveaza</a>
        <a href="javascript:loadPage('products.php')" class="btn btn-secondary">Anuleaza</a>
    </form>
</div>