<?php
  session_start();

  $title = "Välkommen";
  $bodyID = "index";
  include 'includes/header.php';

  if(isset($_POST['addTask'])) {
    addTask();
  }
?>

<?php if($_SESSION['username']) : ?>
  <nav>
    <a href="logout.php">Logga ut <?php echo $_SESSION['username']; ?></a>
    <h1>App</h1>
  </nav>

  <section>
    <ul>
      <li>Betal räkninga</li>
      <li>Fa ut me hundn</li>
      <li>Fa ti pallenas</li>
      <li>Bäntzi olympics</li>
    </ul>
    <form action="index.php" method="post">
      <input type="text" name="taskName">
      <input type="submit" name="addTask" value="Lägg till">
    </form>
  </section>
<?php else : ?>
  <h1>Du har inte tillgång till den här sidan!</h1>
<?php endif; ?>
</body>
</html>