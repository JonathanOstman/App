<?php include "includes/header.php";
  session_start();
  include "includes/navigation.php";
  $bodyClass = "settings";

  $successMessage = '';

  if (isset($_POST['saveProfile'])) {
    saveProfile();
    $successMessage = saveProfile();
  }
?>

<div class="container-fluid">
  <div class="row justify-content-center settings">
    <form class="col-12 col-sm-8 col-lg-3 userForms animated fadeInDownBig uglySolutionFixLater" action="settings.php" method="post" enctype="multipart/form-data">
      <?php if ($successMessage): ?>
        <div class="col-12 alert alert-success">
          <?php echo $successMessage; ?>
        </div>
        <?php endif; ?>
      <div class="custom-file">
         <input type="file" name="profilepic" class="custom-file-input" id="validatedCustomFile" required>
         <label class="custom-file-label" for="validatedCustomFile">Välj fil...</label>
         <div class="invalid-feedback">Example invalid custom file feedback</div>
       </div>
       <button name="saveProfile" type="submit" class="col-12 btn btn-outline-light">Spara</button>
    </form>

  </div>
</div>

<?php include "includes/footer.php"; ?>