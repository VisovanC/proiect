<?php
session_start();
require_once('includes/db_connect.php');
include "includes/header.php"
?>
<?php include "includes/nav.php";
?>
<div class="container-fluid vh-100" style="margin-top:-70px;">
    <div class="row vh-100">
        <img src="images/banner.jpg" style="object-fit: cover;width: 100%;height:100%;" />
        <div class="fls-image-overlay">
            <div class="container vh-100 ">
                <div class="row h-75 align-items-center">
                    <div class="col text-center">
                        <p>Bun venit la </P>
                        <H1 class="mb-5">FlowerShop</H1>
                        <p> Destinația ta online pentru a găsi cele mai frumoase flori și buchete pentru orice ocazie specială! 
                        <p> Suntem o florărie virtuală dedicată aducerii bucuriei în viețile clienților noștri prin intermediul florilor proaspete și a serviciilor impecabile.</p>
                        <h2>,,Nu livrăm dоаr flоri, livrăm zâmbеtе și buсuriе lа ușа tа!”</h2>
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