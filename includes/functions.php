<?php

  function appName() {
    return "To-Do";
  }

  function registerUser() {
    global $connection;
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(usernameExists($username)) {
      return $errorMessage = "Användarnamnet finns redan";
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

  function loginUser() {
    $db_username = '';
    $db_password = '';

    global $connection;
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
      $db_profilepic = $row['profilepic'];
    }

    $password = crypt($password, $db_password);

    if ($username === $db_username && $password === $db_password) {
      $_SESSION['id'] = $db_id;
      $_SESSION['username'] = $db_username;
      $_SESSION['profilepic'] = $db_profilepic;
      header("Location: admin.php");
    }
    else {
      return $errorMessage = "Fel användarnamn eller lösenord!";
    }

  }

  function usernameExists($username) {
    global $connection;

    $query = "SELECT username FROM users WHERE username = '$username' ";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) > 0) {
      return true;
    }
    else {
      return false;
    }
  }



  function addTask() {
    global $connection;

    $taskName = $_POST['taskName'];
    $userID = $_SESSION['id'];

    $query = "INSERT INTO tasks(title, user_id)";
    $query .= "VALUES('$taskName', '$userID')";

    $result = mysqli_query($connection, $query);
  }


  function getTask() {
    global $connection;

    $userID = $_SESSION['id'];

    $query = "SELECT * FROM tasks WHERE user_id = $userID";
    $result = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($result)) : ?>
    <?php $taskName = $row['title']; ?>
      <li>
        <?php echo $row['title']; ?>
        <a class="deleteIcon" href="delete.php?taskID=<?php echo $row['id']; ?>"><i class="far fa-trash-alt"></i></a>
        <a class="editIcon" href="edit.php?taskID=<?php echo $row['id']; ?>&taskName=<?php echo $taskName; ?>"><i class="far fa-edit"></i></a>
      </li>

  <?php endwhile;
  }

  function countUsers() {
    global $connection;

    $query = "SELECT COUNT('user_id') FROM users";
    $result = mysqli_query($connection, $query);
    $rows = mysqli_fetch_row($result);
    return $rows[0];
  }
  function fixUsernameInTitle() {
    global $title;
    if (isset($_SESSION['username'])) {
      $username = $_SESSION['username'];
      if (strlen($username) > 0) {
        if ($username[strlen($username) - 1] !== 's') {
          $title = $username . 's' . ' uppgifter';
        }
        else {
          $title = $username . ' uppgifter';
        }
      }
    }
  }

  function saveProfile() {
    global $connection;

    $profilepic = $_FILES['profilepic']['name'];
    $profilepic_temp = $_FILES['profilepic']['tmp_name'];
    move_uploaded_file($profilepic_temp, "img/profilepics/$profilepic");

    $query = "UPDATE users SET profilepic = '{$profilepic}' WHERE id = '{$_SESSION['id']}' ";
    $saveProfileQuery = mysqli_query($connection, $query);

    $_SESSION['profilepic'] = $profilepic;

    if (!$saveProfileQuery) {
      die("Query failed" . mysqli_error($connection));
    }
    else {
      return $successMessage = "Profilen uppdaterades!";
    }

  }

?>