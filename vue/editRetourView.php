<section class="container my-10" style="margin-bottom: 50px;">
</section>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<?php require_once('../vue/header.php'); ?>

<body>

    <div class="container my-5">

        <section>
            
        
                    <?php  if ($messageInscription) : {?>
                        <div class="alert alert-success" role="alert" style="text-align:center ;">
                        vous avez ajouter un retour avec succès.</div> <?php } endif?>
            <h2 class="mb-3">Nouveau Retour</h2>
        </section>
        
        
        <form name="add" action="editRetour.php?op=a" method="GEST">

            <?php if ($_SESSION['login'] === "root") : ?>
                <section class="mb-3">
                    <div class="col-md-6">

                        <label for="id_client" class="form-label">Nom Client :</label>
                        <select id="id_client" name="id_client" class="form-select">
                            <option value=""></option>
                            <?php foreach ($Tabs as $client) {
                                echo $client;
                            } ?>
                        </select>
                        <br />
                        <span class="text-danger"><?= $erreurs['id_client'] ?? '' ?></span>

                    <?php endif; ?>
                    </div>
                </section>


                <section class="mb-3">
                    <label for="id_ens" class="form-label">Enseignes:</label>
                    <div class="col-md-6">
                        <select class="form-select" aria-label="Default select example" name="id_ens" id="id_ens" value="<?= htmlentities($valeurs['id_ens'] ?? '') ?>">
                            <option selected>Selectionnez l'enseigne</option>



                            <?php foreach ($lignes as $ligne) {
                                echo $ligne;
                            } ?>
                        </select>
                        <span class="text-danger"><?= $erreurs['id_ens'] ?? '' ?></span>
                    </div>
                </section>

                <section class="mb-3">
                    <label for="select_id_statut" class="form-label">Statuts:</label>
                    <div class="col-md-6">
                        <select class="form-select" aria-label="Default select example" name="select_id_statut" id="select_id_statut" value="<?= htmlentities($valeurs['select_id_statut'] ?? '') ?>">
                            <option selected>Selectionnez un statut</option>
                            <?php foreach ($rows as $row) {
                                echo $row;
                            } ?>
                        </select>
                        <span class="text-danger"><?= $erreurs['select_id_statut'] ?? '' ?></span>
                    </div>
                </section>

                <section class="mb-3">
                    <label for="date_achat" class="form-label">Date achat :</label>
                    <div class="col-md-6">
                        <input id="date_achat" name="date_achat" type="date" class="form-control" size="30" maxlength="30" value="<?php echo date("Y-m-d"); ?>" />
                        <br />
                        <span class="text-danger"><?= $erreurs['date_achat'] ?? '' ?></span>
                    </div>
                </section>

                <section class="mb-3">
                    <label for="date_envoi" class="form-label">Date envoie :</label>
                    <div class="col-md-6">
                        <input id="date_envoi" name="date_envoi" type="date" class="form-control" size="30" maxlength="30" value="<?php echo date("Y-m-d"); ?>" />
                        <br />
                        <span class="text-danger"><?= $erreurs['date_envoi'] ?></span>
                    </div>
                </section>
                <section class="mb-3">
                    <label for="date_remboursement" class="form-label">Date de remboursement :</label>
                    <div class="col-md-6">
                        <input id="date_remboursement" name="date_remboursement" type="date" class="form-control" size="30" maxlength="30" value="<?php echo date("Y-m-d"); ?>" />
                        <br />
                        <span class="text-danger"><?= $erreurs['date_remboursement'] ?></span>
                    </div>
                </section>


                <section class="mb-3">
                    <div class="col-md-6">
                        <input type="submit" id="Valider" name="Valider" class="btn btn-primary" value="Valider" />
                        &emsp;
                        <input type="button" class="btn btn-secondary" onclick="window.location.href='../controleur/retour.php'" value="Annuler" />                    </div>
                </section>

        </form>

        <script>
            let select_id_ens = document.getElementById("id_ens");
            dselect(select_id_ens, {
                search: true
            });
            let select_id_statut = document.getElementById("select_id_statut");
            dselect(select_id_statut, {
                search: true
            });
        </script>

    </div>

</body>

<?php require_once('../vue/footer.php'); ?>
<script>
    console.log(document.getElementById('id_ens').value);
</script>