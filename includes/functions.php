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

    echo $taskName = $_POST['taskName'];
    echo $userID = $_SESSION['id'];

    $query = "INSERT INTO tasks(title, user_id)";
    $query .= "VALUES('$taskName', '$userID')";

    $result = mysqli_query($connection, $query);

    $query = "SELECT title FROM users WHERE user_id = $userID";
    $getTask = mysqli_query($connection, $query);

    
  }
?>