<header class="col-12 d-flex align-items-center justify-content-center" id="profileHeader">
  <figure>
    <?php if ($_SESSION['profilepic']): ?>
      <div id="cont">
        <div id="box">
          <img src="img/profilepics/<?php echo $_SESSION['profilepic']; ?>" class="img-fluid" alt="<?php $_SESSION['username'] ?>">
        </div>
      </div>
    <?php else : ?>
          <i class="fas fa-user-circle"></i>
    <?php endif; ?>
    <h1><?php echo $_SESSION['username']; ?></h1>
  </figure>
</header>
