<?php
  $title="Välkommen ";
  $bodyClass="d-flex justify-content-center align-items-center";
  include "includes/header.php";

?>
  <!-- Background video -->
  <video loop muted autoplay>
    <source src="vid/app.mp4" type="video/mp4">
    Din webbläsare har inte stöd för HTML5 video.
  </video>
  <!-- Background video END -->

  <!-- Main content -->
  <main class="col-12 col-sm-8 col-lg-4 animated fadeInDownBig text-center">
    <img src="to-do-logo.svg" class="img-fluid">
    <p>Med <span><?php echo countUsers(); ?></span> registrerade användare!</p>
    <a href="login.php"><button type="button" class="btn btn-outline-light">Logga in</button></a>
    <a href="register.php"><button type="button" class="btn btn-outline-light">Registrera</button></a>
  </main>
  <!-- Main content END -->
<?php
  include "includes/footer.php";
?>