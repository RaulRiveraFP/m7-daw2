<?php
session_start();
?>


<header class="navigation ">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="Egen"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
      aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navigation">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="portfolio.php">Portfolio</a></li>
        <li class="nav-item"><a class="nav-link" href="testimonis.php">Testimonis</a></li>

        <?php if (isset($_SESSION['usuari_id'])): ?>
          <li class="nav-item">
            <span class="nav-link text-white">
              Hola, <?= htmlspecialchars($_SESSION['nom']) ?> (<?= htmlspecialchars($_SESSION['rol']) ?>)
            </span>
          </li>
          
          <!-- Mostrar el enlace al panell d'administració si el rol és 'admin' -->
          <?php if ($_SESSION['rol'] == 'admin'): ?>
            <li class="nav-item">
              <a class="nav-link" href="adminPanel.php">Panell d'Administració</a>
            </li>
          <?php endif; ?>

          <li class="nav-item">
            <a class="nav-link" href="logout.php">Tancar sessió</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Registre</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
</header>
