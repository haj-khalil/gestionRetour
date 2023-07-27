<section class="container my-10" style="margin-bottom: 50px;">
    <?php require_once('../vue/header.php');
    ?>
</section>

<body>
    <?php require_once('../vue/header.php'); ?>
    <?php
    if (isset($lignes) && $lignes != []) {
        $totalPages = 15; // nombre d'éléments à afficher par page
        $nombre_total = count($lignes); // nombre total d'éléments
        $nombre_de_pages = ceil($nombre_total / $totalPages); // nombre de pages à afficher
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // numéro de la page actuelle (si non spécifié, afficher la première page)
        $indice_depart = ($currentPage - 1) * $totalPages; // indice de départ pour afficher les éléments de la page actuelle
        $elements_a_afficher = array_slice($lignes, $indice_depart, $totalPages); // extraire les éléments à afficher pour la page actuelle
    ?>

        <section class="container my-5">
            <h1 class="text-center mb-4">Historique</h1>

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
                        <?php foreach ($elements_a_afficher as $ligne) : ?>
                            <?php echo $ligne; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <nav aria-label="Pagination">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?php echo $currentPage == 1 ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $currentPage - 1; ?>" tabindex="-1" aria-disabled="true">Précédent</a>
                    </li>

                    <?php for ($i = 1; $i <= $nombre_de_pages; $i++) : ?>
                    <?php endfor; ?>

                    <li class="page-item <?php echo $currentPage == $nombre_de_pages ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $currentPage + 1; ?>">Suivant</a>
                    </li>
                </ul>
            </nav>
            <!-- End Pagination -->
        </section>
    <?php
    } else {
        var_dump("<p class='text-center'>Historique vide !</p>");
    }
    ?>


</body>
<?php require_once("../vue/footer.php") ?>
<!-- Inclure le script JavaScript de Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<style>
    html {
        overflow: scroll;
        overflow-x: hidden;
    }
    
    ::-webkit-scrollbar {
        width: 0px;
    }
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



    .h-historique {
        color: orange;
    }
</style>

</html>