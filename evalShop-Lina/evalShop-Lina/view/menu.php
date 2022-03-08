<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Navbar</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./?path=main&action=home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./?path=main&action=contact">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./?path=main&action=formInscription">Inscription</a>
        </li>
        <?php

        if (!isset($_SESSION["email"])) :
        ?>

          <li class="nav-item">
            <a class="nav-link" href="./?path=main&action=formLogin">Se connecter</a>
          </li>
        <?php else : ?>

          <li class="nav-item">
            <a class="nav-link" href="./?path=main&action=logout">Se deconnecter</a>
          </li>
        <?php endif; ?>
        <?php if (isset($_SESSION["role"])) :

          if ($_SESSION["role"] == "client") : ?>
            <li class="nav-item">
              <a class="nav-link" href="./?path=client&action=panier">Mon panier</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./?path=client&action=#">Mes commandes</a>
            </li>
        <?php
          endif;

          if ($_SESSION["role"] == "admin") : ?>
            <li class="nav-item">
              <a class="nav-link" href="./?path=admin&action=admin">Admin</a>
            </li>
        <?php
          endif;



        endif;
        ?>





      </ul>
    </div>
  </div>
</nav>

<br>
<?php if (isset($_SESSION['email'])) : ?>
  <p>Bonjour <?= $_SESSION['email'] ?> ( <?= $_SESSION['role'] ?> )</p>
<?php endif; ?>