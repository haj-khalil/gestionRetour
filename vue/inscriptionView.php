<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../vue/style/styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
    <style>
        .erreur {
            color: red;
        }
    </style>
    <header>
        <h1> Formulaire inscription </h1>
    </header>

    <section>
        <form method="GET" action="" name="add">

            <table class="table">
                <tr>
                    <td><label for="nom">Nom</label></td>
                    <td><input id="nom" required name="nom" type="text" size="15" class="form-control" value="<?= htmlentities($valeurs['nom'] ?? '') ?>" /></td>
                    <td><span class="text-danger"><?= $erreurs['nom'] ?? '' ?></span></td>
                </tr>

                <tr>
                    <td><label for="prenom">Prénom</label></td>
                    <td><input id="prenom" required name="prenom" type="text" size="15" class="form-control" value="<?= htmlentities($valeurs['prenom'] ?? '') ?>" /></td>
                    <td><span class="text-danger"><?= $erreurs['prenom'] ?? '' ?></span></td>
                </tr>

                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input id="email" required name="email" type="email" size="15" class="form-control" value="<?= htmlentities($valeurs['email'] ?? '') ?>" /></td>
                    <td><span class="text-danger"><?= $erreurs['email'] ?? '' ?></span></td>
                </tr>

                <tr>
                    <td><label for="select_pays">Pays</label></td>
                    <td>
                        <select name="select_pays" id="select_pays" class="form-control">
                            <option value="France">France</option>
                        </select>
                    </td>
                    <td><span class="text-danger"><?= $erreurs['pays'] ?? '' ?></span></td>
                </tr>

                <tr>
                    <td><label for="address">Adresse</label></td>
                    <td><input id="address" required name="address" type="text" size="15" class="form-control" value="<?= htmlentities($valeurs['address'] ?? '') ?>" /></td>
                    <td><span class="text-danger"><?= $erreurs['address'] ?? '' ?></span></td>
                </tr>

                <tr>
                    <td><label for="tel">Téléphone</label></td>
                    <td><input id="tel" required name="tel" type="text" size="15" class="form-control" value="<?= htmlentities($valeurs['tel'] ?? '') ?>" /></td>
                    <td><span class="text-danger"><?= $erreurs['tel'] ?? '' ?></span></td>
                </tr>

                <tr>
                    <td><label for="naissance">Date de naissance</label></td>
                    <td><input id="naissance" required name="naissance" type="date" size="15" class="form-control" value="<?= htmlentities($valeurs['naissance'] ?? '') ?>" /></td>
                    <td><span class="text-danger"><?= $erreurs['naissance'] ?? '' ?></span></td>
                </tr>

                <tr>
                    <td><label for="mdp">Mot de passe</label></td>
                    <td><input type="password" name="mdp" id="mdp" placeholder="Au moins 6 caractères" class="form-control" value="<?= htmlentities($valeurs['mdp'] ?? '') ?>" /></td>
                    <td><span class="text-danger"><?= $erreurs['mdp'] ?? '' ?></span></td>
                </tr>


                <tr>
                    <td><label for="mdpRep">confimez le mot de passe</label></td>
                    <td><input type="password" name="mdpRep" id="mdpRep" placeholder="confirmation de mot de passe" class="form-control" value="<?= htmlentities($valeurs['mdpRep'] ?? '') ?>" /></td>
                    <td><span class="text-danger"><?= $erreurs['mdp'] ?? '' ?></span></td>
                </tr>


                <tr class="centre">
                    <td><input type="submit" id="valider" name="valider" class="btn btn-success" value="valider"/></td>
                    <td><button type="button" class="btn btn-danger" onclick="window.location.href='../controleur/login.php'">Annuler</button></td>
                </tr>


    </section>
    <?php
    if ($messageInscription) : {

    ?>
            <div class="alert alert-success" role="alert" style="text-align:center 
            ;">
                votre inscription a été prise en compte avec succès.
            </div>
    <?php
        }
    endif
    ?>
    </from>
    <script>
        lesOptionPayes();

        function lesOptionPayes() {
            URL = "https://restcountries.com/v2/all";
            fetch(URL)
                .then(function(res) {
                    if (res.ok) {
                        return res.json()
                    } else alert("il ya un probléme survenu avec le server !")
                })

                .then(function(json) {
                    console.log(json)
                    afficherLesOptions(json)
                })

                .catch(function(error) {
                    alert("error dans la requete " + error)
                    return false;
                })

            function afficherLesOptions(lesPayes) {
                for (let paye of lesPayes) {
                    let option = document.createElement('option')
                    option.innerHTML = paye['name']
                    document.getElementById('select_pays').appendChild(option)
                }
            }
        }
    </script>
</body>

=======
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../vue/style/styles.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
</head>

<body>
    <style>
        .erreur{
            color: red;
        }
    </style>
    <!--     <form name="add" action="get" action=""></form> -->
    <form method="POST" action="" name="add">

        <section>
            <div>
                <label for="nom"> nom</label>
                <input id="nom" name="nom" type="text" size="15" value="<?= htmlentities($valeurs['nom'] ?? '') ?>" />
                <br />
                <span class="erreur"><?= $erreurs['nom'] ?? '' ?></span>
                
            </div>
            <br>

            <div>
                <label for="prenom">prenom</label>
                <input id="prenom" name="prenom" type="text" size="15" value="<?= htmlentities($valeurs['prenom'] ?? '') ?>" />
                <br />
                <span class="erreur"><?= $erreurs['prenom'] ?? '' ?></span>

            </div>
                <br>
            <div>
                <label for="email">email</label>
                
                <input id="email" name="email" type="email" size="15" value="<?= htmlentities($valeurs['email'] ?? '') ?>" />
                <br />
                <span class="erreur"><?= $erreurs['email'] ?? '' ?></span>
                
            </div>
            
            <br>
            <div>
                <label for="address">address</label>
                <input id="address" name="address" type="text" size="15" value="<?= htmlentities($valeurs['address'] ?? '') ?>" />
                <br />
                <span class="erreur"><?= $erreurs['address'] ?? '' ?></span>

            </div>
            <br>
            <div>
                
                <label for="tel">tel</label>
                <input id="tel" name="tel" type="text" size="15" value="<?= htmlentities($valeurs['tel'] ?? '') ?>" />
                <br />
                <span class="erreur"><?= $erreurs['tel'] ?? '' ?></span>

            </div>

            <br>
            <div>
                <label for="naissance">naissance</label>

                <input id="naissance" name="naissance" type="date" size="15" value="<?= htmlentities($valeurs['naissance'] ?? '') ?>" />
                <br />
                <span class="erreur"><?= $erreurs['naissance'] ?? '' ?></span>

            </div>
            <br>
            <div>
                <label for="mdp">mot de pass</label>
                <input type="password" name="mdp" id="mdp" placeholder="au moins 6 charats"
                value="<?= htmlentities($valeurs['mdp'] ?? '') ?>"/>
                <br />
                <span class="erreur" ><?= $erreurs['mdp'] ?? '' ?></span>
            </div>
            <div>
                //****J'ai complété pour confirmer le mot de passe si c'était le but */
                <label for="mdp">mot de pass</label>
                <input type="password" name="mdpRep" id="mdp" placeholder="confirmez votre mot de passe"
                value="<?= htmlentities($valeurs['mdp'] ?? '') ?>"/>
                <br />
            
            </div>
            <br>
            <div class="centre">
                <input type="submit" id="valider" name="valider" value="valider" />
            </div>

        </section>
    </from>

</body>

>>>>>>> f79f36075427c21767750931446a43cea51ca600
</html>