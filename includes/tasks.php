<section id="tasks" class="col-12 col-sm-8 col-lg-4">
  <h2>Att göra</h2>
  <ul class="list-unstyled">
    <?php
      $query = "SELECT * FROM tasks WHERE user_id = {$_SESSION['id']} ";
      $result = mysqli_query($connection, $query);
      while($row = mysqli_fetch_array($result)) :
    ?>

        <li>
          <?php echo $row['title']; ?>
          <a href="edit.php?taskID=<?php echo $row['id']; ?>&taskName=<?php echo $row['title']; ?>"><i class="far fa-edit"></i></a>
          <a href="delete.php?taskID=<?php echo $row['id']; ?>"><i class="fas fa-trash-alt"></i></a>
        </li>

    <?php endwhile; ?>

  </ul>

  <form action="admin.php" class="form-inline my-2 my-lg-0 justify-content-center" method="post">
    <input type="text" name="taskName" class="form-control mr-sm-2">
    <input type="submit" name="addTask" class="btn btn-outline-success my-2 my-sm-0" value="Lägg till">
  </form>
</section>