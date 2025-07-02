<?php include "includes/header.php" ?>
<?php include "includes/nav.php" ?>
<?php
session_start();
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
  header('Location: user_page.php');
}
?>
<div class="container mt-5">
  <div class="row justify-content-center my-2">
    <div class="col-auto d-flex flex-row"><i class="fa-solid fa-user p-1"></i>
      <h4 class="px-3">LOGIN</h4>
    </div>
  </div>
  
  <?php if(isset($_SESSION['error'])): ?>
    <div class="row justify-content-center my-2">
      <div class="col-7">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php 
            echo $_SESSION['error']; 
            unset($_SESSION['error']);
          ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
  <?php endif; ?>
  
  <div class="row justify-content-center my-2">
    <div class="col-7">
      <form method="POST" action="utils/do_login.php">
        <div class="form-group row">
          <label for="username" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Parolă</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
          </div>
        </div>
        <div class="row justify-content-center my-4">
          <div class="col-auto text-center"><button type="submit" class="btn fls-btn fls-add-chart-btn">Login</button></div>
          <div class="col-auto text-center"><a href="create_user.php" class="btn fls-btn fls-add-chart-btn">Utilizator nou</a></div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include "includes/footer.php" ?>