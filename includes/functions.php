<?php
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
    
    $query = "SELECT title FROM tasks WHERE user_id = $userID";

    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($result)) {
      echo "<li>" . $row['title'] . "</li>";
    }
  }

?>