<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
  <a class="navbar-brand" href="admin.php">
    <img src="to-do-logo.svg" alt="To-Do">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Konto</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="settings.php">Inställningar</a>
          <a class="dropdown-item" href="logout.php">Logga ut <?php echo $_SESSION['username']; ?></a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Sök efter uppgifter" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sök</button>
    </form>
  </div>
</nav>