<?php
  $currentTaskName = $_GET['taskName'];
  $bodyID = "edit";
  $title = "Ändra ". $currentTaskName . "?";
  include 'includes/header.php';


  if (!empty($_GET['taskID'])) {
    $taskID = $_REQUEST['taskID'];
  }

  if (!empty($_POST)) {
    $taskID = $_POST['taskID'];
    $taskTitle = $_POST['edit'];
    $query = "UPDATE tasks SET title = '$taskTitle' WHERE id = $taskID ";
    $updateTaskQuery = mysqli_query($connection, $query);
    header("Location: admin.php");
  }
?>



<form action="edit.php" method="post">
  <input type="hidden" name="taskID" value="<?php echo $taskID; ?>">
  <input type="text" name="edit" value="<?php echo $currentTaskName ?>">
  <input type="submit" name="submit" value="Ändra">
</form>
<a href="index.php">Go back</a>