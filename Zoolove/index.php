<?php
session_start();
require_once('includes/db_connect.php');
include "includes/header.php";
include "includes/nav.php";
?>

<div class="container-fluid vh-100" style="margin-top:-70px;">
    <div class="row vh-100">
        <img src="images/banner.jpg" style="object-fit: cover;width: 100%;height:100%;" />
        <div class="fls-image-overlay">
            <div class="container vh-100 ">
                <div class="row h-75 align-items-center">
                    <div class="col text-center">
                        <p>Bun venit la </p>
                        <h1 class="mb-5">ZooLove</h1>
                        <p>Destinația ta pentru tot ce înseamnă dragoste și grijă pentru animalele de companie!</p>
                        <p>Suntem pasionați de bunăstarea prietenilor tăi necuvântători și oferim o gamă largă de produse de calitate pentru câini, pisici și alte animale de companie.</p>
                        <h2>„Animalele tale, pasiunea noastră!"</h2>
                        <p>
                            <a href="products.php" class="btn fls-btn fls-add-chart-btn mx-auto">Magazin online</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Secțiune Despre Noi -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Despre ZooLove</h2>
                <p>La ZooLove, înțelegem că animalele de companie sunt parte din familie. De aceea, ne-am dedicat să oferim doar cele mai bune produse pentru prietenii tăi blănoși.</p>
                <p>Cu o experiență de peste 10 ani în domeniu, echipa noastră de specialiști selectează cu grijă fiecare produs pentru a asigura calitatea și siguranța animalelor tale.</p>
                <ul>
                    <li>Produse premium de la branduri de încredere</li>
                    <li>Consultanță gratuită pentru alegerea produselor potrivite</li>
                    <li>Livrare rapidă în toată țara</li>
                    <li>Garanție de satisfacție 100%</li>
                </ul>
            </div>
            <div class="col-md-6">
                <img src="images/about-us.jpg" class="img-fluid" alt="Despre noi">
            </div>
        </div>
    </div>
</section>

<!-- Produse recomandate -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Produse recomandate</h2>
        <div class="row">
            <?php
            $sql = "SELECT products.*, categories.name AS category_name FROM products
                    JOIN categories ON products.category = categories.id 
                    WHERE products.new = 1 
                    LIMIT 3";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
            <div class="col-md-4">
                <div class="card border-0 fls-product-card">
                    <img class="product_image card-img-top" src="<?php echo $row["image"]; ?>" 
                         data-toggle="modal" data-target="#productModal" 
                         data-id="<?php echo $row["id"]; ?>" 
                         alt="<?php echo $row["name"]; ?>" />
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row["name"]; ?></h5>
                        <p class="card-text">RON <?php echo $row["price"]; ?></p>
                    </div>
                    <div class="fls-product-icon-action d-flex justify-content-center flex-column">
                        <a href="#" class="fls-product-button" title="Adaugă la favorite">
                            <i class="fa-regular fa-heart"></i>
                        </a>
                        <a href="javascript:addToCart({
                            id:<?php echo $row["id"]; ?>,
                            price:<?php echo $row["price"]; ?>
                        })" class="fls-product-button" title="Adaugă în coș">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                        <a href="#" class="fls-product-button" title="Vezi detalii">
                            <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>

<?php include "product.php" ?>
<?php include "includes/footer.php" ?>