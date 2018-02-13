<?php
  $title = "Registrera";
  $bodyClass = "register";
  include 'includes/header.php';
  $errorMessage = '';

  session_start();

  if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(usernameExists($username)) {
      $errorMessage = "Användarnamnet finns redan";
    }
    else {
      $username = mysqli_real_escape_string($connection, $username);
      $password = mysqli_real_escape_string($connection, $password);

      $hashFormat = '$2y$10$';
      $salt = 'sa2ravmM5Rqq2VLs68RA3R';

      $hashAndSalt = $hashFormat . $salt;

      $password = crypt($password, $hashAndSalt);

      $query = 'INSERT INTO users(username, password)';
      $query .= "VALUES ('$username', '$password')";

      $result = mysqli_query($connection, $query);
      if (!$result) {
        die("Query failed") . mysqli_error($connection);
      }

      header('Location: login.php');
    }
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
  <a href="register.php">Ny användare? Registrera dig här</a>
</form>

<?php include "includes/footer.php" ?>