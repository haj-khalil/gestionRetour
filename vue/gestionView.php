<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--  <link rel="stylesheet" href="../vue/style/styles.css" /> -->
    <title>Edit Retour</title>
</head>

<body> 
    <header>

        <?php require_once('../vue/header.php'); ?>

    </header>

    <form method="GET" action="../controleur/gestion.php" name="add">

        <div class="container text-center" style="padding-top: 100px;">
            <div class="row">
                <div class="col">
                    <section>

                        <h2>effacer une enseigne </h2>
                        <select class="form-select" aria-label="Default select example" name="select_id_ens" id="select_id_ens">
                            <option selected>select l'entreprise</option>
                            <?php
                            foreach ($lignes as $ligne) {
                                echo $ligne;
                            }
                            ?>
                        </select>
                        <br />
                        <label>&nbsp;</label>
                        <span class="erreur"><?= $erreurs['id_ens'] ?? '' ?></span>
                        <div>
                            <input type="submit" id="effacerEns" name="effacerEns" value="effacerEns" />
                            <br>
                            <input type="submit" id="annuler" name="annuler" value="Annuler" />
                        </div>


                    </section>
                </div>

                <div class="col">
                    <section>
                        <h2>effacer un statut </h2>
                        <select class="form-select" aria-label="Default select example" name="select_id_statut" id="select_id_statut">
                            <option selected>select statut à effacer </option>
                            <?php
                            foreach ($rows as $row) {
                                echo $row;
                            }
                            ?>
                        </select>
                        <br />
                        <span class="erreur"><?= $erreurs['id_statut'] ?? '' ?></span>
                        <label>&nbsp;</label>
                        <div>
                            <input type="submit" id="effacerStatut" name="effacerStatut" value="effacerStatut" />
                            <br>
                            <input type="submit" id="annuler" name="annuler" value="Annuler" />
                        </div>



                    </section>
                </div>
                <div class="col">
                    <section>
                        <h2>effacer un motif </h2>
                        <select class="form-select" aria-label="Default select example" name="select_id_motif" id="select_id_motif">
                            <option selected>select un motif à effacer </option>
                            <?php
                            foreach ($rowsMotifs as $row) {
                                echo $row;
                            }
                            ?>
                        </select>
                        <br />
                        <span class="erreur"><?= $erreurs['id_motif'] ?? '' ?></span>
                        <label>&nbsp;</label>
                        <div>
                            <input type="submit" id="effacerMotif" name="effacerMotif" value="effacerMotif" />
                            <br>
                            <input type="submit" id="annuler" name="annuler" value="Annuler" />
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="container text-center" style="padding-top: 100px;">
            <div class="row">
                <div class="col">
                    <section>
                        <h2>ajouter une enseigne</h2>
                        <label for="nomEns">entrez le nom de l'enseigne</label>
                        <input id="nomEns" name="nomEns" type="text" size="15" value="<?= htmlentities($valeurs['nomEns'] ?? '') ?>" />
                        <br />
                        <span class="erreur"><?= $erreurs['nomEns'] ?? '' ?></span>
                        <label>&nbsp;</label>
                        <div>
                            <input type="submit" id="ajouterEns" name="ajouterEns" value="ajouterEns" />
                            <br>
                            <input type="submit" id="annuler" name="annuler" value="Annuler" />
                        </div>
                </div>
                </section>
                <div class="col">
                    <section>
                        <h2>Ajouter un statut</h2>
                        <label for="nomStatut">entrez le nom de l'enseigne</label>
                        <input id="nomStatut" name="nomStatut" type="text" size="15" value="<?= htmlentities($valeurs['nomStatut'] ?? '') ?>" />
                        <br />
                        <span class="erreur"><?= $erreurs['nomStatut'] ?? '' ?></span>

                        <label>&nbsp;</label>
                        <div>
                            <input type="submit" id="ajouterStatut" name="ajouterStatut" value="ajouterStatut" />
                            <br>
                            <input type="submit" id="annuler" name="annuler" value="Annuler" />
                        </div>
                </div>
                </section>
                <div class="col">
                    <section>
                        <h2>Ajouter un motif</h2>
                        <label for="nomMotif">entrez le motif</label>
                    
                        <input id="nomMotif" name="nomMotif" type="text" size="15" value="<?= htmlentities($valeurs['nomMotif'] ?? '') ?>" />
                        <br />
                        <span class="erreur"><?= $erreurs['nomMotif'] ?? '' ?></span>

                        <label>&nbsp;</label>
                        <div>
                            <input type="submit" id="ajouterMotif" name="ajouterMotif" value="ajouterMotif" />
                            <br>
                            <input type="submit" id="annuler" name="annuler" value="Annuler" />
                        </div>
                </div>
                </section>
            </div>
        </div>

    </form>
    <style>
        section {
            color: #219cee;
            background-color: #040e29;
            border: 2px solid blue;
            border-radius:  25px;
            text-align: center;
        }

        input {
            width: 40%;
            border-radius: 10px;
        }

        #annuler {
            background-color: #B0C4DE;
        }

        .erreur {
            border-radius: 10px;
            background-color: red;
            font-weight: bolder;
        }
        header section {
            border-radius:  0px; 
        }
    </style>
</body>

</html>