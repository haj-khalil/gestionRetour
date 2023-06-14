<?php require_once('../vue/header.php'); ?>
<section class="container my -10" style=" margin-bottom: 50px;">

    <head>

        <meta charset="utf-8">
        <title>Liste des retours</title>
        <!-- ///** */ -->
        <link rel="stylesheet" href="../vue/style/style3.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="../vue/style.js"></script>
        <!-- ///** */ -->
    </head>
</section>

<body>
    
    <form method="GET" action="../controleur/retour.php" name="add">
        <h1 class="text-center mb-4">Liste des Retours</h1>

        <section class="container my-5">
            <div class="input-control">
                <input type="text" id="searchInput" class="form-control w-50 me-2" placeholder="Recherche..." oninput="filterTable()" aria-label="Search">
                <div id="messageRecherch" style="display: none;" class="alert alert-danger w-50" role="alert">Pas de résultat !</div>
            </div>


            <?php
            if (isset($lignes) && $lignes != []) : {
                    $nombre_par_page = 15; // nombre d'éléments à afficher par page
                    $nombre_total = count($lignes); // nombre total d'éléments
                    $nombre_de_pages = ceil($nombre_total / $nombre_par_page); // nombre de pages à afficher
                    $page_actuelle = isset($_GET['page']) ? $_GET['page'] : 1; // numéro de la page actuelle (si non spécifié, afficher la première page)
                    $indice_depart = ($page_actuelle - 1) * $nombre_par_page; // indice de départ pour afficher les éléments de la page actuelle
                    $elements_a_afficher = array_slice($lignes, $indice_depart, $nombre_par_page); // extraire les éléments à afficher pour la page actuelle
            ?>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead>
                                <?php if ($_SESSION['login'] != 'root') : {
                                ?>



                                        <tr>

                                            <td colspan="13" style="text-align:right">
                                                <a href="../controleur/editRetour.php?op=a&id_client=<?php echo urlencode($_SESSION['id_client']); ?>">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                                                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                </a>
                                            </td>

                                        </tr>
                                <?php }
                                endif; ?>
                                <tr>
                                    <th onclick="">Numéro de retour</th>
                                    <th>Enseigne</th>
                                    <th>Date d'achat</th>
                                    <th>Date d'envoi</th>
                                    <th>Date de remboursement</th>
                                    <th>Label</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Montant</th>
                                    <th>Articles</th>
                                    <th>Supprimer</th>
                                    <th>Changer statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($elements_a_afficher as $ligne) {
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
            else : echo "<p class='text-center' >Il n'y a pas de retour encore</p>";
            endif;
            ?>
        </section>
        <!-- Modal
        ///** */ -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <h2>Actualiser</h2>
                        <select class="form-select" required aria-label="Default select example" name="select_id_statut" id="select_id_statut">
                            <option selected>Choisissez un statut </option>
                            <?php
                            foreach ($rows as $row) {
                                echo $row;
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label for="date_remboursement">Date de remboursement</label>
                        <input type="date" id="date_remboursement" name="date_remboursement" value="<?php echo date("Y-m-d"); ?>">


                    </div>

                    <div class="modal-footer">
                        <input type="text" id="id_retour_modif_statut" style="display:none;" name="id_retour_modif_statut" value="">
                        <input type="submit" id="updateStatut" name="updateStatut" class="btn btn-secondary" value="Actualiser" />
                        <input type="submit" id="annuler" name="annuler" value="Quitter" class="btn btn-secondary" data-dismiss="modal" />
                    </div>
                </div>
            </div>
        </div>
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

            th {
                text-align: center;
                vertical-align: middle;
            }

            input[type=button]:not(:disabled) {
                width: 60px;
            }

            .article {
                background-color: #5F7780;
            }

            #table_article {
                background-color: lightcyan;
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
        </style>
        <script src="../vue/style.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="../vue/retourAdmin.js"></script>
    </form>

</body>




<?php require_once("../vue/footer.php") ?>