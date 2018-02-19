<?php
  $title = "Logga in!";
  $bodyClass = "login";
  include 'includes/header.php';
  session_start();

  $errorMessage = '';

  if (isset($_POST['login'])) {
    loginUser();
    $errorMessage = loginUser();
  }
?>
  <form class="col-12 col-sm-8 col-lg-3 userForms animated fadeInDownBig" action="login.php" method="post">
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
    <button name="login" type="submit" class="col-12 btn btn-outline-light">Logga in</button>
    <a href="register.php">Ny användare? Registrera dig här</a>
  </form>

<?php include "includes/footer.php" ?>