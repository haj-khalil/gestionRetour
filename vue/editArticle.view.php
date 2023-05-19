<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit article</title>
</head>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}
input[type=number], select, textarea {
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
  background-color: #f2f2f2;
  padding: 20px;
  margin-top: 100px;
}
h2{
    
}
a {
    color: #0d6efd;
    text-decoration: none;
}
section{
    display: inline;
}
</style>
<body>

    <div><h2>Ajoutez des articles au Retour : <h2><p id="id_ret"><?php  echo $id_retour;
        ?></p></div>
    <div class="container">
    <form  id="formulaire"  class="row g-3" method="GET" action="" name="add">
    <input type="hidden" name="id_article" value="<?= $valeurs['id_article'] ?? '' ?>">

        <div class="col-md-6">
            <label for="inputNom" class="form-label">Article: </label>
            <input type="text" name="nom_article" class="form-control" id="nom_article" value="<?= $valeurs['nom_article'] ?? '' ?>">
          <span class="text-danger"><?= $erreurs['nom_article'] ?? '' ?></span>
        </div>
        <div class="col-12">
            <label for="inputQuantite" class="form-label">Quantité: </label>
            <input type="number"  name="quantite" class="form-control" id="inputQuantite" value="<?= $valeurs['quantite'] ?? '' ?>">
          <span class="text-danger"><?= $erreurs['quantite'] ?? '' ?></span>
        </div>
         <div class="col-md-6">
            <label for="inputMontant" class="form-label">Montant: </label>
            <input type="number" name="montant_piece" class="form-control" id="inputMontant" value="<?= $valeurs['montant_piece'] ?? '' ?>" >
            <span class="input-group-text">€</span>
        </div>
        <div class="col-md-2">
            <select id="id_motif" class="form-select" aria-label="Default select example" name="id_motif" id="id_motif" value="<?= $valeurs['motif'] ?? '' ?>">
                <option selected>Selectionnez un motif:  </option>

                    <?php
                        foreach ($columns as $column) {
                            echo $column;
                        }
                    ?>
            </select>
            <input type="text" style="visibility: hidden;" onchange="getIdRetour(this.value)" id="id_retour" 
             name="id_retour" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"
            ></input>
        </div>
        <section>
            <label>&nbsp;</label>
            <div>
                <input type="submit" id="valider" name="valider" value="valider" />
                <a href="../controleur/retourAdmin.php">

                &emsp;
                <input type="submit" id="annuler" name="annuler" value="Annuler" />
                <a href="../controleur/retourAdmin.php">
            </div>

        </section>
</form>
</div>
<script>
    valeur= document.getElementById('id_ret').innerHTML
    document.getElementById('id_retour').value=valeur;
</script>
</body>
</html>