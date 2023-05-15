

</html>
<?php
require_once("../vue/footer.php") ?>

<section class="container my -10" style=" margin-bottom: 50px;">
    <?php require_once('../vue/header.php'); ?>

</section>

<body>

    <form method="GET" action="../controleur/histoire.php" name="add">
        <section class="container my-5">
            <?php
            if (isset($lignes) && $lignes != []) : {
                    $nombre_par_page = 10; // nombre d'éléments à afficher par page
                    $nombre_total = count($lignes); // nombre total d'éléments
                    $nombre_de_pages = ceil($nombre_total / $nombre_par_page); // nombre de pages à afficher
                    $page_actuelle = isset($_GET['page']) ? $_GET['page'] : 1; // numéro de la page actuelle (si non spécifié, afficher la première page)
                    $indice_depart = ($page_actuelle - 1) * $nombre_par_page; // indice de départ pour afficher les éléments de la page actuelle
                    $elements_a_afficher = array_slice($lignes, $indice_depart, $nombre_par_page); // extraire les éléments à afficher pour la page actuelle
            ?>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead>
                                <tr>
                                    <td colspan="12" style="text-align:right">
                                        <a href="../controleur/editRetourArticle.php?op=a">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                <a href="../controleur/editRetourArticle.php"></a>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Numéro changement</th>
                                    <th>user</th>
                                    <th> time </th>
                                    <th>table</th>
                                    <th>action</th>
                                    <th>detaille</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($lignes as $ligne) {
                                    echo $ligne; // tableau de lignes à créer dans /controleur/salles.php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <?php for ($i = 1; $i <= $nombre_de_pages; $i++) : ?>
                                <li class="page-item <?php if ($page_actuelle == $i) {
                                                            echo 'active';
                                                        } ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </nav>
            <?php
                }
            else : echo "<p class='text-center' > historic vide ! </p>";
            endif;
            ?>
        </section>
        <style>
            .article {
                background-color: blanchedalmond;
            }

            #img_x {
                width: 24px;
                height: 24px;
            }

            td {
                text-align: center;
            }
        </style>
        <script src="../vue/style.js"></script>
    </form>
</body>


<?php require_once("../vue/footer.php") ?>