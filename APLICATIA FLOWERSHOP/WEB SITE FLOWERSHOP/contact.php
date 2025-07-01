<?php
session_start();
require_once('includes/db_connect.php');
include "includes/header.php"
?>
<?php include "includes/nav.php" ?>

<body>

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
                    <h3 class="mb-4">Ținem legătura</h3>
                    <div id="form-message-warning" class="mb-4"></div>
                    <div id="form-message-success" class="mb-4">
                      Mesajul tău a fost trimis. Îți Mulțumim!
                    </div>
                    <form method="POST" id="contactForm" name="contactForm" class="contactForm" novalidate="novalidate">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="label" for="name">Nume</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nume">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="label" for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="label" for="subject">Subiect</label>
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subiect">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="label" for="#">Mesaj</label>
                            <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Mesaj"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <input type="submit" value="Send Message" class="btn fls-btn fls-add-chart-btn">
                            <div class="submitting"></div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-lg-4 col-md-5 d-flex align-items-stretch">
                  <div class="info-wrap bg-fls w-100 p-md-5 p-4">
                    <h3>Let's get in touch</h3>
                    <p class="mb-4">Asteptăm sugestiile tale</p>
                    <div class="dbox w-100 d-flex align-items-start">
                      <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-map-marker"></span>
                      </div>
                      <div class="text pl-3">
                        <p><span>Adresa:</span> str. Fântânele, nr. 23, Bistrița, jud. Bistrița - Năsăud</p>
                      </div>
                    </div>
                    <div class="dbox w-100 d-flex align-items-center">
                      <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-phone"></span>
                      </div>
                      <div class="text pl-3">
                        <p><span>Phone:</span> <a href="tel://1234567920">0745686895</a></p>
                      </div>
                    </div>
                    <div class="dbox w-100 d-flex align-items-center">
                      <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-paper-plane"></span>
                      </div>
                      <div class="text pl-3">
                        <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@flowershop.com</a></p>
                      </div>
                    </div>
                    <div class="dbox w-100 d-flex align-items-center">
                      <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-globe"></span>
                      </div>
                      <div class="text pl-3">
                        <p><span>Website</span> <a href="#"> flowershop </a></p>
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