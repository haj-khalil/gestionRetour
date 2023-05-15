<!doctype html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Gestion des retours</title>

  <link rel="canonical" href="https://getbootstrap.comhttps://getbootstrap.com/docs/5.1/examples/sticky-footer-navbar/">
  <!-- Bootstrap core CSS -->
  <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Favicons -->
  <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#7952b3">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
 

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
</head>

<body class="d-flex flex-column h-100">
<body class="d-flex flex-column h-100">
  <header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <?php if (isset($_SESSION['login'])) : { ?>

          <div class="container-fluid">
            
            
            <a class="navbar-brand"  href="menu.php"> <img style="height:70px; margin: -10px;" src="../vue/style/logo3.png" alt="">  </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                  <a style="color: #219cee; " class="nav-link active" aria-current="page" href="../controleur/menu.php">Menu</a>
                </li>
                <li class="nav-item">
                  <a style="color: #219cee; " class="nav-link <?php echo !empty($index) ? 'active' : ''; ?>" href="../controleur/retourAdmin.php">Retours</a>
                </li>
                <?php if ($_SESSION['login'] == 'root') : { ?>
                    <li class="nav-item">
                      <a style="color: #219cee; " class="nav-link" href="../controleur/client.php">Clients</a>
                    </li>
                    <li class="nav-item">
                      <a style="color: #219cee; " class="nav-link" href="../controleur/histoire.php">Historique</a>
                    </li>
                    <li class="nav-item">
                      <a style="color: #219cee; " class="nav-link" href="../controleur/gestion.php">Paramètres</a>
                    </li>
                <?php }
                endif;
                ?>
                <?php if ($_SESSION['login'] != 'root') : {
                ?>
                    <li class="nav-item">
                      <a style="color: #219cee; " class="nav-link active" aria-current="page" href="../controleur/editRetourArticle.php">Ajouter</a>
                    </li>
                <?php }
                endif;
                ?>
                <li class="nav-item">
                  <a style="color: #219cee; " class="nav-link" href="../controleur/logout.php">Déconnexion</a>
                </li>

              </ul>
              <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Recherche</button>
              </form>
            </div>
          </div>
      <?php }
      endif ?>
    </nav>
  </header>



</body>

<style>
  li {

    font-size: 20px;
    font-weight: bolder;
    font-family: 'Signika Negative', sans-serif;
    padding-right: 15px;

  }
</style>

</html>
