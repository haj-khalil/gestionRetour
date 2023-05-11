
<body>
    
    <?php require_once('../vue/header.php'); ?> 


    <form class="row g-3" method="GET" action="" name="add">
        <div class="col-md-6">
            <label for="inputNom" class="form-label">Nom article</label>
            <input type="text" name="nom_article" class="form-control" id="nom_article">
        </div>
        <div class="col-12">
            <label for="inputQuantite" class="form-label">Quantité</label>
            <input type="number"  name="quantite" class="form-control" id="inputQuantite">
        </div>
         <div class="col-md-6">
            <label for="inputMontant" class="form-label">Montant</label>
            <input type="number" name="montant_piece" class="form-control" id="inputMontant" >
            <span class="input-group-text">€</span>
        </div>
        <div class="col-md-2">
            <select class="form-select" aria-label="Default select example" name="id_motif" id="id_motif">
                <option selected>select motif </option>
                    <?php
                        foreach ($columns as $column) {
                            echo $column;
                        }
                    ?>
            </select>
            <input type="text" style="visibility: hidden;" onchange="getIdRetour(this.value)" id="id_retour" name="id_retour" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"
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
<script>
    valeur= document.getElementById('id_ret').innerHTML
    document.getElementById('id_retour').value=valeur
</script>
</body>
</html>