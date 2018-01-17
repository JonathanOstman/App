<?php
  include 'includes/db.php';
  session_start();


  if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $hashFormat = '$2y$10$';
    $salt = 'sa2ravmM5Rqq2VLs68RA3R';

    $hashAndSalt = $hashFormat . $salt;

    $password = crypt($password, $hashAndSalt);

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);

    if (!$select_user_query) {
      die("Query failed");
    }

    while ($row = mysqli_fetch_array($select_user_query)) {
      $db_username = $row['username'];
    }

    if ($username === $db_username) {
      echo "Username already taken, try again";
    }
    else {
      $query = 'INSERT INTO users(username, password)';
      $query .= "VALUES ('$username', '$password')";

      $result = mysqli_query($connection, $query);
      if (!$result) {
        die("Query failed") . mysqli_error($connection);
      }

      header('Location: login.php');
    }
  }
  $title = "Registrera";
  include 'includes/header.php'
?>
  <form class="animated fadeInDownBig login" action="register.php" method="post">
    <h3>Registrera</h3>
    <input type="text" name="username" placeholder="Användarnamn" required autofocus>
    <input type="password" name="password" placeholder="Lösenord" required>
    <input class ="submit" type="submit" name="register" value="Registrera">
  </form>

</body>
</html>