

<form action="/products.php" method="post">
<div id="filters" class="p-3 my-2">
  <div class="row">
    <h4>
    <i class="fa-solid fa-arrow-up-short-wide"></i> Filtre: 
    </h4>
  </div>
  <div class="row">
    <div class="col">
      <label for="fls-color-filter">Culoare:</label>
      <select id="fls-color-filter" name="filter-color">
      <option value="">Toate culorile</option>
        <?php $sql = "SELECT * FROM color";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
        <option value="<?php echo $row["color"] ?>"><?php echo $row["color"] ?></option>
        <?php }
        }?>
      </select>
    </div>
    <div class="col">
      <label for="fls-price-filter">Preț:</label>
        <select id="fls-price-filter" name="filter-price">
          <option value="">Toate prețurile</option>
          <option value="0-50">Sub 50 lei</option>
          <option value="50-100">50 - 100 lei</option>
          <option value="100-200">100 - 200 lei</option>
          <option value="200-5000">200 lei și peste</option>
        </select>
    </div>
    <div class="col">
      <label for="fls-category-filter">Categorie:</label>
      <select id="fls-category-filter" name="filter-category">
        <option value="">Toate categoriile</option>
        <?php $sql = "SELECT * FROM categories";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
        <option value="<?php echo $row["name"] ?>"><?php echo $row["description"] ?></option>
        <?php }
        }?>
      </select>
    </div>
    <div class="col-auto">
      <input type="submit" id="filter-button" value="Filtrare" class="btn fls-add-chart-btn">
    </div>
  </div>
</div>
</form>
<script src="script/filters.js"></script>