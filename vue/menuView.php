<section class="container my-10" style="margin-bottom: 50px;">
  <?php require_once('../vue/header.php'); ?>
</section>

<body class="d-flex flex-column min-vh-100">
  <header class="container my-5">
    <?php require_once('../vue/header.php'); ?>
  </header>

  <div class="container mt-6">
    <div class="row"> <!-- Utiliser la classe "row" pour créer une rangée -->
      <div class="col">
        <a href="../controleur/retourAdmin.php" class="text-decoration-none text-dark">
          <div class="card text-center">
            <div class="card-body">
              <h2 class="card-title">Retours</h2>
              <img src="../vue/style/menu.png" class="img-fluid" alt="" style="max-width: 150px; margin: 0 auto;"> <!-- Diminuer la taille des images -->
            </div>
          </div>
        </a>
      </div>

      <?php if ($isAdmin) : ?>
        <div class="col">
          <a href="../controleur/client.php" class="text-decoration-none text-dark">
            <div class="card text-center">
              <div class="card-body">
                <h2 class="card-title">Clients</h2>
                <img src="../vue/style/client.png" class="img-fluid" alt="" style="max-width: 150px; margin: 0 auto;"> <!-- Diminuer la taille des images -->
              </div>
            </div>
          </a>
        </div>
      <?php endif; ?>

      <?php if (!$isAdmin) : ?>
        <div class="col">
          <a href="../controleur/editRetourArticle.php" class="text-decoration-none text-dark">
            <div class="card text-center">
              <div class="card-body">
                <h2 class="card-title">Nouveau Retour</h2>
                <img src="../vue/style/editer.png" class="img-fluid" alt="" style="max-width: 150px; margin: 0 auto;"> <!-- Diminuer la taille des images -->
              </div>
            </div>
          </a>
        </div>
      <?php endif; ?>

      <?php if ($isAdmin) : ?>
        <div class="col">
          <a href="../controleur/gestion.php" class="text-decoration-none text-dark">
            <div class="card text-center">
              <div class="card-body">
                <h2 class="card-title">Paramètres</h2>
                <img src="../vue/style/para.png" class="img-fluid" alt="" style="max-width: 150px; margin: 0 auto;"> <!-- Diminuer la taille des images -->
              </div>
            </div>
          </a>
        </div>

        <div class="col">
          <a href="../controleur/histoire.php" class="text-decoration-none text-dark">
            <div class="card text-center">
              <div class="card-body">
                <h2 class="card-title">Historiques</h2>
                <img src="../vue/style/action.png" class="img-fluid" alt="" style="max-width: 150px; margin: 0 auto;"> <!-- Diminuer la taille des images -->
              </div>
            </div>
          </a>
        </div>
      <?php endif; ?>
    </div>

    <?php if (!$isAdmin) : ?>
      <div class="row mt-5">
        <div class="col-md-6">
          <div class="card text-center">
            <div class="card-body">
              <h2 class="card-title">Montant Remboursé</h2>
              <p class="card-text"><?php echo $montantTotaleRembourse . " €"; ?></p>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card text-center">
            <div class="card-body">
              <h2 class="card-title">Montant en attente</h2>
              <p class="card-text"><?php echo $montantTotaleEnAttente . " €"; ?></p>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <footer class="footer mt-auto bg-dark text-light" style="width: 100%; height:15%">
    <div class="container">
      <span class="text-muted">© 2023 Tous droits réservés.</span>
    </div>
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
