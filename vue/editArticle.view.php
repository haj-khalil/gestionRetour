<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit article</title>
</head>

<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-image: url("../vue/style/back7.jpg");
        background-size: cover;
        background-repeat: no-repeat;
    }

    header {
        padding-bottom: 30px;
    }

    * {
        box-sizing: border-box;
    }

    input[type=text],
    select,
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;

    }

    input[type=number],
    select,
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=submit] {
        background-color: #04AA6D;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .container {
        border-radius: 5px;
        background-color: none;
        padding: 10px;
        margin-top: 80px;
        margin-bottom: 50px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        /* Ajout */
        justify-content: center;
        /* Ajout */
        height: 100%;

    }

    .contenu {
        height: 700px;
        width: 900px;
        margin-top: 90px;
        margin-left: 30%;
        padding: 10px;


    }


    a {
        color: #0d6efd;
        text-decoration: none;
    }

    section {
        display: inline;
    }



    body {
        padding-top: 5%;
    }

    h1 {
        font-family: "Times New Roman", Times, serif;
        text-align: center;
        margin: 80px;
        font-size: 2em;
    }

    @media screen and (max-width: 600px) {
        h1 {
            font-size: 1.5em;
        }
    }

    @media screen and (max-width: 400px) {
        h1 {
            font-size: 1.2em;
        }
    }

    .btn {
        height: 50px;
        background-color: rgba(25, 156, 255, 1);
    }

    .btn:hover {
        height: 52px;
    }

    #valider {
        background-image: linear-gradient(to right, rgba(187, 5, 150, 0.8), rgba(5, 101, 187, 0.8));
        margin-left: 10%;
    }

    #annuler {
        background-image: linear-gradient(to right, rgba(187, 5, 150, 0.8), rgba(5, 101, 187, 0.8));
        margin-right: 10%;
    }

</style>


<body>

    <body>
        <?php require_once('../vue/header.php'); ?>


        <form method="GET" action="" name="add">
            <div>

                <!-- <h1><spam>Ajoutez des articles au Retour : </spam> -->
                <?php
                if ($op == "mA") {
                    echo '<h1><span style="color: white;">Modification des articles :</span></h1>';
                } else {
                    echo '<h1><span style="color: white;">Ajout des articles :</span></h1>';
                }
                ?>

                <spam id="id_ret"><?php echo $id_retour; ?></spam>
                </h1>

            </div>
            <div class="container">
                <form id="formulaire" class="row g-3" method="GET" action="" name="add">
                    <input type="hidden" name="id_article" value="<?= $valeurs['id_article'] ?? '' ?>">
                    <div class="contenu">
                        <div class="col-md-6">
                            <label for="inputNom" class="form-label" style="color: white;">Article: </label>
                            <input type="text" name="nom_article" class="form-control" id="nom_article" value="<?= $valeurs['nom_article'] ?? '' ?>">
                            <span class="text-danger"><?= $erreurs['nom_article'] ?? '' ?></span>
                        </div>

                        <div class="col-md-6">
                            <label for="inputQuantite" class="form-label" style="color: white;">Quantité</label>
                            <input type="number" name="quantite" class="form-control" id="inputQuantite" placeholder="1" min="1" value="<?= htmlentities($valeurs['quantite'] ?? '') ?>">
                            <div id="erreur-quantite" class="text-danger"></div>
                            <span class="erreur"><?= $erreurs['quantite'] ?? '' ?></span>


                        </div>

                        <div class="col-md-6">
                            <label for="inputMontant" class="form-label" style="color: white;">Montant </label>
                            <input type="number" required name="montant_piece" class="form-control" min="0.00" step="0.01" placeholder="0.00" id="inputMontant" value="<?= htmlentities($valeurs['montant_piece'] ?? '') ?>">
                            <div id="erreur-montant" class="text_danger"></div>
                            <span class="erreur"><?= $erreurs['montant_piece'] ?? '' ?></span>
                        </div>

                        <div class="col-md-6">
                            <label for="inputMontant" class="form-label" style="color: white;">Selectionnez un motif </label>

                            <select id="id_motif" class="form-select" aria-label="Default select example" name="id_motif" value="<?= htmlentities($valeurs['id_motif'] ?? '') ?>">
                                <option>select motif </option>
                                <?php
                                foreach ($columns as $column) {
                                    echo $column;
                                }
                                ?>
                            </select>
                            <div id="erreur-motif" class="text-danger"></div>
                            <span class="text-danger"><?= $erreurs['id_motif'] ?? '' ?></span>

                            <!-- // input hidden pour recupere le id_retour -->
                            <input type="text" style="visibility: hidden;" id="id_retour" name="id_retour" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"></input>
                        </div>
                        <section>
                            <label>&nbsp;</label>
                            <div id="lesbtn">
                                <input type="submit" id="valider" name="valider" value="valider" class="btn " />
                                <a href="../controleur/retour.php">

                                    &emsp;
                                    <input type="submit" onclick="window.location.href='../controleur/retour.php'" id="annuler" name="annuler" value="Annuler" class="btn " />
                                    <!-- recupere le id_motif -->
                                    <input type="hidden" id="recupere_id_motif" value="<?= htmlentities($valeurs['id_motif'] ?? '') ?>" />
                                    <!-- recupere le id_motif -->
                                    <input type="hidden" id="recupere_id_motif" value="<?= htmlentities($valeurs['id_motif'] ?? '') ?>" />
                            </div>
                        </section>
                    </div>


                </form>
            </div>
            <script src="../vue/script.js"></script>
            <script>
                // recuperer id_retour de retour.php et l'envoyer a edistArticle.php
                valeur = document.getElementById('id_ret').innerHTML
                document.getElementById('id_retour').value = valeur;


                document.getElementById('valider').onclick = function(event) {

                    let valide = true;
                    document.querySelector('#erreur-nom').innerHTML = '';
                    document.querySelector('#erreur-quantite').innerHTML = '';
                    document.querySelector('#erreur-montant').innerHTML = '';
                    document.querySelector('#erreur-motif').innerHTML = '';


                    const REGEX_NOM = /^[a-zA-ZÀ-ÿ]{2,25}$/;
                    const REGEX_QUANTITE = /^([1-9]|[1-9][0-9]{1,3}|10000)(\.[0-9]+)?$/;
                    const REGEX_MONTANT = /^(?:\p{Sc}\s*)?([1-9]\d*|0)(?:\.\d{1,2})?(?:\s*\p{Sc})?$/;

                    if (!document.getElementById('nom_article').value.match(REGEX_NOM)) {
                        valide = false;
                        document.getElementById('erreur-nom').innerHTML = 'Le nom est obligatoire et doit contenir entre 2 et 25 lettres.';
                    }

                    if (!document.getElementById('inputQuantite').value.match(REGEX_QUANTITE)) {
                        valide = false;
                        document.getElementById('erreur-quantite').innerHTML = 'La quantité est obligatoire et doit être un nombre positif inférieur ou égal à 1000.';
                    }

                    if (!document.getElementById('inputMontant').value.match(REGEX_MONTANT)) {
                        valide = false;
                        document.getElementById('erreur-montant').innerHTML = "Le montant est invalide.";
                    }

                    if (document.getElementById('id_motif').value = "select motif") {
                        valide = false;
                        document.getElementById('erreur-motif').innerHTML = 'Le motif est obligatoire.';
                    }

                    if (!valide) {
                        // permet de ne pas submit le formulaire si on utilise la fonction addEventListener
                        console.log("arret l'/excution")
                        event.preventDefault();
                    }



                    return valide;
                };

                // mettre le ancian motif au première place 
                recupere_id_motif = document.getElementById('recupere_id_motif').value
                lesOptions = document.getElementsByTagName('option')
                for (let option of lesOptions) {
                    if (option.value == recupere_id_motif) {
                        option.setAttribute('selected', 'selected')
                        option.setAttribute('selected', 'selected')
                    }
                }
            </script>

    </body>

</html>