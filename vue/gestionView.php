<header>

    <?php require_once('../vue/header.php'); ?>

</header>

<body>


    <form method="GET" action="../controleur/gestion.php" name="add">

        <div class="container text-center" style="padding-top: 100px;">
            <div class="row">
                <div class="col">
                    <section>

                        <h2>Effacer une enseigne </h2>
                        <select class="form-select" aria-label="Default select example" name="select_id_ens" id="select_id_ens">
                            <option selected>Selectionnez l'enseigne</option>
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
                            <input type="submit" id="effacerEns" name="effacerEns" value="Supprimer" />
                            <br>
                            <input type="submit" id="annuler" name="annuler" value="Annuler" />
                        </div>


                    </section>
                </div>

                <div class="col">
                    <section>
                        <h2>Effacer un statut </h2>
                        <select class="form-select" aria-label="Default select example" name="select_id_statut" id="select_id_statut">
                            <option selected>Selectionnez un statut à effacer </option>
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
                            <input type="submit" id="effacerStatut" name="effacerStatut" value="Supprimer" />
                            <br>
                            <input type="submit" id="annuler" name="annuler" value="Annuler" />
                        </div>



                    </section>
                </div>
                <div class="col">
                    <section>
                        <h2>Suppression Motif</h2>
                        <select class="form-select" aria-label="Default select example" name="select_id_motif" id="select_id_motif">
                            <option selected>Choisissez un motif à effacer </option>
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
                            <input type="submit" id="effacerMotif" name="effacerMotif" value="Supprimer" />
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
                        <h2>Ajout d'une enseigne</h2>
                        <label for="nomEns">Entrez le nom de l'enseigne</label>
                        <input id="nomEns" name="nomEns" type="text" size="15" value="<?= htmlentities($valeurs['nomEns'] ?? '') ?>" />
                        <br />
                        <span class="erreur"><?= $erreurs['nomEns'] ?? '' ?></span>
                        <label>&nbsp;</label>
                        <div>
                            <input type="submit" id="ajouterEns" name="ajouterEns" value="Ajout" />
                            <br>
                            <input type="submit" id="annuler" name="annuler" value="Annuler" />
                        </div>
                </div>
                </section>
                <div class="col">
                    <section>
                        <h2>Ajout statut</h2>
                        <label for="nomStatut">Entrez un statut</label>
                        <input id="nomStatut" name="nomStatut" type="text" size="15" value="<?= htmlentities($valeurs['nomStatut'] ?? '') ?>" />
                        <br />
                        <span class="erreur"><?= $erreurs['nomStatut'] ?? '' ?></span>

                        <label>&nbsp;</label>
                        <div>
                            <input type="submit" id="ajouterStatut" name="ajouterStatut" value="Ajout" />
                            <br>
                            <input type="submit" id="annuler" name="annuler" value="Annuler" />
                        </div>
                </div>
                </section>
                <div class="col">
                    <section>
                        <h2>Ajout motif</h2>
                        <label for="nomMotif">Entrez le motif</label>

                        <input id="nomMotif" name="nomMotif" type="text" size="15" value="<?= htmlentities($valeurs['nomMotif'] ?? '') ?>" />
                        <br />
                        <span class="erreur"><?= $erreurs['nomMotif'] ?? '' ?></span>

                        <label>&nbsp;</label>
                        <div>
                            <input type="submit" id="ajouterMotif" name="ajouterMotif" value="Ajout" />
                            <br>
                            <input type="submit" id="annuler" name="annuler" value="Annuler" />
                        </div>
                </div>
                </section>
            </div>
        </div>

    </form>
    <!-- <style>
        section {
            color: #219cee;
            background-color: red;
            border: 2px solid blue;
            border-radius: 25px;
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
            border-radius: 0px;
        }
    </style>
    <script>
        let select_id_ens = document.getElementById("select_id_ens");
        dselect(select_id_ens, {
            search: true
        })
        let select_id_motif = document.getElementById("select_id_motif");
        dselect(select_id_motif, {
            search: true
        })
        let select_id_statut = document.getElementById("select_id_statut");
        dselect(select_id_statut, {
            search: true
        })
    </script>
</body>

<?php require_once("../vue/footer.php") ?>