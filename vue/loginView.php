<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Authentification</title>

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
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
    <section class="container mt-5">
        <h1 class="text-center mb-4">Authentification</h1>
        <form method="POST" action="login.php" name="add">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="mb-3">
                        <label for="login" class="form-label">Email</label>
                        <input type="text" name="login" id="login" class="form-control" value="<?= htmlentities($identifiants['login']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="motDePasse" class="form-label">Mot de passe</label>
                        <input type="password" name="motDePasse" id="motDePasse" class="form-control" value="">
                    </div>
                    <div class="d-grid">
                        <button type="submit" id="Connexion" name="Connexion" class="btn btn-primary">Connexion</button>
                    </div>
                    <div ><?= $message ?></div>
                    <p class="text-center mt-3">Pas encore inscrit ? <a href="../controleur/inscription.php">Cliquez ici pour vous inscrire</a></p>
                </div>
            </div>
        </form>
    </section>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
</body>

</html>