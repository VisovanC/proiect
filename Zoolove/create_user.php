<?php include "includes/header.php" ?>
<?php include "includes/nav.php"?>
<?php 
  session_start();
  if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    header('Location: user_page.php');
  } 
?>
<div class="container mt-5">
    <div class="row justify-content-center my-2">
        <div class="col-auto d-flex flex-row"><i class="fa-solid fa-user p-1"></i><h4 class="px-3">Loghează-te</h4></div>
    </div>
    <div class="row justify-content-center my-2">
      <div class="col-7">
        <form method="POST" action="utils/do_create_user.php">
        <div class="form-group row">
          <label for="last_name" class="col-sm-2 col-form-label">Nume</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Nume" required>
            </div>
        </div>
        <div class="form-group row">
          <label for="first_name" class="col-sm-2 col-form-label">Prenume</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Prenume" required>
            </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
        </div>
        <div class="form-group row">
          <label for="phone" class="col-sm-2 col-form-label">Telefon</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefon" required>
            </div>
        </div>
        <div class="form-group row">
          <label for="username" class="col-sm-2 col-form-label">Nume utilizator</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Parola</label>
            <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" placeholder="Parola" required>
            </div>
        </div>
        <div class="form-group row">
          <label for="address" class="col-sm-2 col-form-label">Adresa</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="address" name="address" placeholder="Adresa" required>
            </div>
        </div>
        <div class="row justify-content-center my-4">
        <div class="col-auto text-center"><button type="submit" class="btn fls-btn fls-add-chart-btn">Creare user</button></div>
        </div>
        </form>
      </div>
    </div>
</div>
<?php include "includes/footer.php" ?>