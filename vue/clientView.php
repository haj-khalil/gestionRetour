<section class="container my-10" style="margin-bottom: 50px;">
    <?php require_once('../vue/header.php'); ?>
</section>

<body>
    <section class="container mt-5">
        <h1 class="text-center mb-4">Liste des Clients</h1>
        <form class="d-flex" role="search">
            <div class="input-control">
                <input type="text" name="search" placeholder="Search.." class="form-control w-50 me-2" id="cherch">
                <div id="messageRecherch" style="display: none;" class="alert alert-danger w-50" role="alert">Pas de résultat !</div>
            </div>
        </form>

        <?php
        if (isset($lignes) && $lignes != []) {
            $totalPages = 15; // nombre d'éléments à afficher par page
            $nombre_total = count($lignes); // nombre total d'éléments
            $nombre_de_pages = ceil($nombre_total / $totalPages); // nombre de pages à afficher
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // numéro de la page actuelle (si non spécifié, afficher la première page)
            $indice_depart = ($currentPage - 1) * $totalPages; // indice de départ pour afficher les éléments de la page actuelle
            $elements_a_afficher = array_slice($lignes, $indice_depart, $totalPages); // extraire les éléments à afficher pour la page actuelle
        ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Numéro Client</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Etat</th>
                        <th>Retours</th>
                        <th>Désactiver </th>
                        <th>Activer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($elements_a_afficher as $ligne) : ?>
                        <?php echo $ligne; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <nav aria-label="Pagination">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?php echo $currentPage == 1 ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $currentPage - 1; ?>" tabindex="-1" aria-disabled="true">Précédent</a>
                    </li>



                    <li class="page-item <?php echo $currentPage == $nombre_de_pages ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $currentPage + 1; ?>">Suivant</a>
                    </li>
                </ul>
            </nav>
            <!-- End Pagination -->

        <?php
        } else {
            var_dump("<p class='text-center'>La liste de client est vide !</p>");
        }
        ?>
    </section>
</body>

<style>
    html {
        overflow: scroll;
        overflow-x: hidden;
    }

    ::-webkit-scrollbar {
        width: 0px;
    }

    .input-control {
        display: flex;
        align-items: center;
        background-color: #f2f2f2;
        border-radius: 20px;
        padding: 8px;
        width: 30%;

    }

    .input-control input[type="text"] {
        flex: 1;
        height: 30px;
        border: none;
        padding: 0 8px;
        font-size: 14px;
    }

    td {
        text-align: center;
    }

    th {
        text-align: center;
        vertical-align: middle;
        vertical-align: middle;
    }

    tr {
        text-align: center;
        vertical-align: middle;
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

    .H-clients {
        color: orange;

    }
</style>
<?php require_once('../vue/footer.php'); ?>
<script src="../vue/script.js"></script>