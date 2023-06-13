<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body::after {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-image: url("../vue/style/background.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            filter: blur(5px);
            /* Appliquer un flou de 5 pixels uniquement à l'image de fond */

        }

        header {
            margin-bottom: 80px;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            padding: 10px;
            margin: 0;
            text-align: center;
        }
    </style>
</head>
<header>
    <?php require_once('../vue/header.php'); ?>
</header>

<body>
    <?php $messageE ?>
    <form method="GET" action="../controleur/gestion.php" name="add">

        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col">
                        <div class="btnAjout text-right">
                            <a class="btn btn-primary bg-transparent border-0" role="button" data-toggle="modal" data-target="#modalAjoutEnseigne"><img src="../vue/style/ajout.png"></a>
                        </div>
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c" />
                                <image href="../vue/style/enseigne.png" alt="Placeholder Image" style="width: 420px; height: 420px;  " />
                            </svg>

                            <div class="card-body">
                                <select   class="form-select" aria-label="Default select example" name="select_id_ens" id="select_id_ens">
                                    <option selected>Selectionnez l'enseigne</option>
                                    <?php
                                    foreach ($lignes as $ligne) {
                                        echo $ligne;
                                    }
                                    ?>
                                </select>
                                <label>&nbsp;</label>
                                <span class="erreur"><?= $erreurs['id_ens'] ?? '' ?></span>
                                <div><?php echo $messageE; ?></div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="submit" id="effacerEns" name="effacerEns" value="Supprimer" class="btn btn-sm btn-outline-secondary">Supprimer</button>
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Annuler</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="btnAjout text-right">
                            <a class="btn btn-primary bg-transparent border-0" role="button" data-toggle="modal" data-target="#modalAjoutStatut"><img src="../vue/style/ajout.png"></a>
                        </div>
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c" />
                                <image href="../vue/style/statut.png" alt="Placeholder Image" style="width:25em; height: 25em;  " />
                            </svg>
                            <div class="card-body">
                                <select class="form-select" aria-label="Default select example" name="select_id_statut" id="select_id_statut">
                                    <option selected>Selectionnez un statut </option>
                                    <?php
                                    foreach ($rows as $row) {
                                        echo $row;
                                    }
                                    ?>
                                </select>
                                <label>&nbsp;</label>
                                <span class="erreur"><?= $erreurs['id_statut'] ?? '' ?></span>
                                <div><?php echo $messageE; ?></div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="submit" id="effacerStatut" name="effacerStatut" value="Supprimer" class="btn btn-sm btn-outline-secondary">Supprimer</button>
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Annuler</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="btnAjout text-right">
                            <a class="btn btn-primary bg-transparent border-0" role="button" data-toggle="modal" data-target="#modalAjoutMotif"><img src="../vue/style/ajout.png"></a>
                        </div>
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c" />
                                <image href="../vue/style/liste.png" alt="Placeholder Image" style="width:450px; height: 450px;  " />
                            </svg>
                            <div class="card-body">
                                <select class="form-select" aria-label="Default select example" name="select_id_motif" id="select_id_motif">
                                    <option selected>Choisissez un motif </option>
                                    <?php
                                    foreach ($rowsMotifs as $row) {
                                        echo $row;
                                    }
                                    ?>
                                </select>
                                <span class="erreur"><?= $erreurs['id_motif'] ?? '' ?></span>
                                <label>&nbsp;</label>
                                <div><?php echo $messageE; ?></div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="submit" id="effacerMotif" name="effacerMotif" value="Supprimer" class="btn btn-sm btn-outline-secondary">Supprimer</button>
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Annuler</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="modal fade" id="modalAjoutEnseigne" tabindex="-1" role="dialog" aria-labelledby="modalAjoutEnseigneLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Enseigne</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="nomEns">Nom de l'enseigne</label>
                                    <input id="nomEns" name="nomEns" type="text" class="form-control" placeholder="Entrer le nom de l'enseigne" value="<?= htmlentities($valeurs['nomEns'] ?? '') ?>">
                                    <br />
                                    <span class="erreur"><?= $erreurs['nomEns'] ?? '' ?></span>
                                    <label>&nbsp;</label>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <div>
                                <input type="submit" id="ajouterEns" name="ajouterEns" value="Ajouter" />
                                <input type="submit" id="annuler" name="annuler" value="Annuler" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalAjoutStatut" tabindex="-1" role="dialog" aria-labelledby="modalAjoutStatutLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Statut</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="nomStatut">Nouveau statut</label>
                                    <input id="nomStatut" name="nomStatut" type="text" class="form-control" placeholder="Enter un statut" value="<?= htmlentities($valeurs['nomStatut'] ?? '') ?>" />
                                    <br />
                                    <span class="erreur"><?= $erreurs['nomStatut'] ?? '' ?></span>

                                    <label>&nbsp;</label>
                                </div>

                                <div class="modal-footer">
                                    <div>
                                        <input type="submit" id="ajouterStatut" name="ajouterStatut" value="Ajouter" />
                                        <input type="submit" id="annuler" name="annuler" value="Annuler" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>


        <div class="modal fade" id="modalAjoutMotif" tabindex="-1" role="dialog" aria-labelledby="modalAjoutMotifLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Motif</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="nomMotif">Nouveau motif</label>
                                <input id="nomMotif" name="nomMotif" type="text" class="form-control" placeholder="Enter un motif" value="<?= htmlentities($valeurs['nomMotif'] ?? '') ?>" />
                                <br />
                                <span class="erreur"><?= $erreurs['nomStatut'] ?? '' ?></span>

                                <label>&nbsp;</label>
                            </div>
                            <div class="modal-footer">
                                <div>
                                    <input type="submit" id="ajouterMotif" name="ajouterMotif" value="Ajouter" />
                                    <input type="submit" id="annuler" name="annuler" value="Annuler" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
    </div>
    </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var boutonAjoutEnseigne = document.querySelector('button[data-target="#modalAjoutEnseigne"]');
            var boutonAjoutStatut = document.querySelector('button[data-target="#modalAjoutStatut"]');
            var boutonAjoutMotif = document.querySelector('button[data-target="#modalAjoutMotif"]');

            var modalAjoutEnseigne = document.getElementById('modalAjoutEnseigne');
            var modalAjoutStatut = document.getElementById('modalAjoutStatut');
            var modalAjoutMotif = document.getElementById('modalAjoutMotif');

            boutonAjoutEnseigne.addEventListener('click', function() {
                modalAjoutEnseigne.style.display = 'block';
            });

            boutonAjoutStatut.addEventListener('click', function() {
                modalAjoutStatut.style.display = 'block';
            });

            boutonAjoutMotif.addEventListener('click', function() {
                modalAjoutMotif.style.display = 'block';
            });
        });
        let select_id_ens = document.getElementById("select_id_ens");
        dselect(select_id_ens, {
            search: true
        });

        let select_id_statut = document.getElementById("select_id_statut");
        dselect(select_id_statut, {
            search: true
        });
        let select_id_motif = document.getElementById("select_id_motif");
        dselect(select_id_motif, {
            search: true
        });

     
    </script>
</body>
<footer>
    <?php require_once("../vue/footer.php") ?>
</footer>

</html>