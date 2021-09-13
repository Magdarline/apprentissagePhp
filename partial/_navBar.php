<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"> Magdarline Decilien</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/test.php">Test</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/exo.php">Exo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/notes.php">Notes</a>
        </li>
        <?php if ($_SESSION["user"]) :
          if (in_array("ROLE_ADMIN", $_SESSION["user"] ["role"])) : ?>
        <li class="nav-item">
          <a class="nav-link active" href="/admin.php">Admin</a>
        </li>
        <?php endif ?>
        <li class="nav-item">
          <a class="nav-link active" href="/deconnexion.php">Déconnexion</a>
        </li>
        <?php else : ?>
        <li class="nav-item">
          <a class="nav-link active" href="/inscription.php">Inscription</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link active" href="/connexion.php">Connexion</a>
        </li>
        <?php endif ?>
        </ul>
    </div>
  </div>
</nav>