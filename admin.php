<?php
  session_start();

  include 'includes/header.php';

  if(isset($_POST['addTask'])) {
    addTask();
  }
?>
<?php if(isset($_SESSION['username'])) : ?>
  <?php include "includes/navigation.php" ?>

  <div class="container-fluid">
    <div class="row">
      <?php include "includes/profile.php" ?>
      <?php //include "includes/tasks.php" ?>
    </div>
  </div>
<?php else : ?>
  <div class="container-fluid">
    <div class="row">

      <div id="forbidden" class="animated shake">
        <h1>&#9760;</h1>
        <p>Du har inte tillgång till den här sidan!</p>

      </div>

    </div>
  </div>

<?php endif;
include "includes/footer.php";
?>

