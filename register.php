<?php
  $title = "Registrera";
  $bodyID = "register";
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
  <form class="animated fadeInDownBig login" action="register.php" method="post">
    <h3>Registrera</h3>
    <input type="text" name="username" placeholder="Användarnamn" required autofocus>
    <input type="password" name="password" placeholder="Lösenord" required>
    <input class ="submit" type="submit" name="register" value="Registrera">
  </form>

  <?php if($errorMessage) : ?>
    <div id="alert" class="animated shake">
      <?php echo $errorMessage; ?>
    </div>
  <?php endif; ?>

</body>
</html>