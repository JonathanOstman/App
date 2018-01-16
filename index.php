<?php
  session_start();

  $title = "Välkommen";

  include 'includes/header.php';
?>

<?php if($_SESSION['username']) : ?>
  <h1 class="animated zoomIn welcome">Välkommen, <?php echo $_SESSION['username']; ?></h1>
  <a href="logout.php">Logga ut <?php echo $_SESSION['username']; ?></a>
<?php else : ?>
  <h1>Fa bort!</h1>
<?php endif; ?>
</body>
</html>