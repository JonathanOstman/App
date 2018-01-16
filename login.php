<?php
  include 'includes/db.php';
  session_start();

  $title = "Logga in!";

  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

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

    if ($username === $db_username && $password === $db_password) {
      $_SESSION['username'] = $db_username;
      header("Location: index.php");
    }
    else {
      header("Location: login.php");
    }
  }
  include 'includes/header.php'
?>
  <form class="animated fadeInDownBig login" action="login.php" method="post">
    <h3>Logga in</h3>
    <input type="text" name="username" placeholder="Användarnamn" required autofocus>
    <input type="password" name="password" placeholder="Lösenord" required>
    <input class ="submit" type="submit" name="login" value="Logga in">
  </form>

</body>
</html>