<?php
session_start();
require_once('includes/db_connect.php');
include "includes/header.php";
include "includes/nav.php";
?>

<body>
    <section class="ftco-section">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Contactează-ne</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="wrapper">
                        <div class="row no-gutters">
                            <div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
                                <div class="contact-wrap w-100 p-md-5 p-4">
                                    <h3 class="mb-4">Ținem legătura! 🐾</h3>
                                    <div id="form-message-warning" class="mb-4"></div>
                                    <div id="form-message-success" class="mb-4">
                                        Mesajul tău a fost trimis. Îți Mulțumim! 🐶
                                    </div>
                                    <form method="POST" id="contactForm" name="contactForm" class="contactForm" novalidate="novalidate">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="name">NUME</label>
                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nume">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="email">EMAIL</label>
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="subject">SUBIECT</label>
                                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subiect">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="#">MESAJ</label>
                                                    <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Mesaj"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="submit" value="TRIMITE MESAJ" class="btn fls-btn fls-add-chart-btn">
                                                    <div class="submitting"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-5 d-flex align-items-stretch">
                                <div class="info-wrap bg-zoolove w-100 p-md-5 p-4">
                                    <h3>Contactează-ne! 🐱</h3>
                                    <p class="mb-4">Așteptăm sugestiile tale și suntem aici pentru a te ajuta!</p>
                                    <div class="dbox w-100 d-flex align-items-start">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-map-marker"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>📍 Adresa:</span> Str. Aleea Plăieșului, nr. 11, Bistrița, jud. Bistrița-Năsăud</p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-phone"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>📞 Telefon:</span> <a href="tel://0263111123">(0263) 111 123</a></p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-paper-plane"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>📧 Email:</span> <a href="mailto:info@zoolove.com">info@zoolove.com</a></p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-globe"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>🌐 Website:</span> <a href="#"> www.zoolove.ro </a></p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-clock"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>🕐 Program:</span><br> L-V: 9:00 - 18:00<br>S: 9:00 - 14:00</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<?php include "includes/footer.php" ?>