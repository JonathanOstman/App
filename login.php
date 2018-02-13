<?php
  $title = "Logga in!";
  $bodyClass = "login";
  include 'includes/header.php';
  session_start();

  $errorMessage = '';
  $db_username = '';
  $db_password = '';

  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);

    if (!$select_user_query) {
      die("Query failed");
    }

    while ($row = mysqli_fetch_array($select_user_query)) {
      $db_id = $row['id'];
      $db_username = $row['username'];
      $db_password = $row['password'];
    }

    $password = crypt($password, $db_password);

    if ($username === $db_username && $password === $db_password) {
      $_SESSION['id'] = $db_id;
      $_SESSION['username'] = $db_username;
      header("Location: admin.php");
    }
    else {
      $errorMessage = "Fel användarnamn eller lösenord!";
    }
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