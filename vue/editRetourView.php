<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Formulaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>

    <div class="centrer-contenu">

        <div class="container my-5">
            <?php if ($messageInscription) : ?>
                <div class="alert alert-success" role="alert" style="text-align: center; width: 50%;">
                    vous avez ajouter un retour avec succès.
                </div>
            <?php endif; ?>
            <section >
                <h1 class="mb-3 titre-formulaire">Nouveau Retour</h1>
            </section>

            <form name="add" action="editRetour.php?op=a" method="GET">
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
                        </div>
                    </section>
                <?php endif; ?>

                <section class="mb-3">
                    <label for="id_ens" class="form-label">Enseignes:</label>
                    <div class="col-md-6">
                        <select class="form-select" aria-label="Default select example" name="id_ens" id="id_ens" value="<?= htmlentities($valeurs['id_ens'] ?? '') ?>">
                            <option class="option_ens">Selectionnez un enseigne</option>
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
                            <option>Selectionnez un statut</option>
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
                        <input id="date_remboursement" name="date_remboursement" type="date" class="form-control" size="30" maxlength="30" value="<?php echo $valeurs['date_remboursement']; ?>" />
                        <br />
                        <span class="text-danger"><?= $erreurs['date_remboursement'] ?></span>
                    </div>
                </section>

                <section class="mb-3">
                    <div class="col-md-6">
                        <input type="submit" id="Valider" name="Valider" class="btn btn-primary" value="Valider" />
                        &emsp;
                        <input type="button" class="btn btn-secondary" onclick="window.location.href='../controleur/retour.php'" value="Annuler" />
                    </div>
                    <!-- recupere les id_statut et id_ens  -->
                    <input type="hidden" id="recupere_id_ens" value="<?= htmlentities($valeurs['id_ens'] ?? '') ?>" />
                    <input type="hidden" id="recupere_id_statut" value="<?= htmlentities($valeurs['id_statut'] ?? '') ?>" />
                </section>
            </form>

        </div>

        <script>
            let select_id_ens = document.getElementById("id_ens");
            dselect(select_id_ens, {
                search: true
            });
            let select_id_statut = document.getElementById("select_id_statut");
            dselect(select_id_statut, {
                search: true
            });

            // mettre le ancien motif au première place 
            recupere_id_ens = document.getElementById('recupere_id_ens').value;
            console.log(recupere_id_ens);

            lesOptions = document.getElementsByClassName('option_ens');
            console.log(lesOptions[0]);
            console.log(lesOptions);
            for (let option of lesOptions) {
                if (option.value == recupere_id_ens) {
                    console.log(option);
                    option.setAttribute('selected', 'selected');
                    console.log(option.value);
                    // lesOptions[0].value=option.value
                    // lesOptions[0].innerText =option.innerText
                }
            }
        </script>
    </div>

</body>
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
        color: white;
        font-family: "Times New Roman", Times, serif;

    }

    h1 {
        color: white;
        font-family: "Times New Roman", Times, serif;
        text-align: center;

    }
   

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;

    }


    .centrer-contenu {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 100%;
        max-width: 50%;
        margin-left: 25%;
    }
    .titre-formulaire {
    position: absolute;
    right: 42%;
    top: 10px;
 
  }
</style>