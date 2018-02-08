<?php
  $title="Välkommen";
  $bodyClass="d-flex justify-content-center align-items-center";
  include "includes/header.php";

?>
  <!-- Background video -->
  <video loop muted autoplay>
    <source src="vid/app.mp4" type="video/mp4">
    Your browser does not support the video tag
  </video>
  <!-- Background video END -->

  <!-- Main content -->
  <main class="col-12 col-sm-8 col-lg-4 animated fadeInDownBig text-center">
    <img src="to-do-logo.svg" class="img-fluid">
    <p>Med <span><?php countUsers(); ?></span> användare idag!</p>
    <a href="login.php"><button type="button" class="btn">Logga in</button></a>
    <a href="register.php"><button type="button" class="btn">Registrera</button></a>
  </main>
  <!-- Main content END -->
<?php
  include "includes/footer.php";
?>