<?php
  $title = "Registrera";
  $bodyClass = "register";
  include 'includes/header.php';
  $errorMessage = '';

  session_start();

  if (isset($_POST['register'])) {
    registerUser();
    $errorMessage = registerUser();
  }
?>
<form class="col-12 col-sm-8 col-lg-3 userForms animated fadeInDownBig" action="register.php" method="post">
  <img src="to-do-logo.svg" class="img-fluid">
  <?php if($errorMessage) : ?>
    <div class="col alert alert-danger animated shake" class="animated shake">
      <?php echo $errorMessage; ?>
    </div>
  <?php endif; ?>
  <div class="form-group">
    <input type="text" class="form-control" name="username" placeholder="Användarnamn" required>
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="password" placeholder="Lösenord" required>
  </div>
  <button name="register" type="submit" class="col-12 btn btn-outline-light">Registrera</button>
  <a href="login.php">Redan användare? Logga in här</a>
</form>

<?php include "includes/footer.php" ?>