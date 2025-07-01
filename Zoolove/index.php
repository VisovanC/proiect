<?php
session_start();
require_once('includes/db_connect.php');
include "includes/header.php"
?>
<?php include "includes/nav.php";
?>
<div class="container-fluid vh-100" style="margin-top:-70px;">
    <div class="row vh-100">
        <img src="images/2.png" style="object-fit: cover;width: 100%;height:100%;" />
        <div class="fls-image-overlay">
            <div class="container vh-100 ">
                <div class="row h-75 align-items-center">
                    <div class="col text-center">
                        <p>Bun venit la </P>
                        <H1 class="mb-5">Zoolove</H1>
                        <p> Locul unde găsești produse de calitate pentru animalul tău de companie </p>
                        <h2>,,Animalele tale, pasiunea noastră!”</h2>
                        <p>
                            <a href="products.php" class="btn fls-btn fls-add-chart-btn mx-auto">Magazin online</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "product.php" ?>
<?php include "includes/footer.php" ?>