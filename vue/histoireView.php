<section class="container my-10" style="margin-bottom: 50px;">
    <?php require_once('../vue/header.php'); ?>
</section>

<body>

    <!--   <?php require_once('../vue/header.php'); ?> -->

    <section class="container my-5">
        <h1 class="text-center mb-4">Liste des Retours</h1>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>N° changement</th>
                        <th>Utilisateur</th>
                        <th>Temps</th>
                        <th>Table</th>
                        <th>Action</th>
                        <th>Détail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lignes as $ligne) : ?>

                        <?php echo $ligne;  ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php if (empty($lignes)) : ?>
            <p class="text-center">Historique vide !</p>
        <?php endif; ?>
    </section>

    <footer class="footer mt-auto bg-dark text-light" style="width: 100%; height:15%">
        <div class="container">
            <span class="text-muted">© 2023 Tous droits réservés.</span>
        </div>
    </footer>

    <!-- Inclure le script JavaScript de Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
<style>
    body {

        background-image: url(../vue/style/back7.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }

    table {
        background-color: #f2f2f2;
        border-radius: 5px;
        margin-top: 10px;

    }

    .text-center {
        color: white;
        font-family: "Times New Roman", Times, serif;

    }

    td {
        text-align: center;
    }

    th {
        text-align: center;
        vertical-align: middle;
    }
</style>

</html>