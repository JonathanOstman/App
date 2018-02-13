<?php

  function appName() {
    return "To-Do";
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


?>