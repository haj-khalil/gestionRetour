
<body>
    
    <?php require_once('../vue/header.php'); ?> 

    <div>ajoutez des articles au Retour <p id="id_ret"><?php  echo $id_retour;
        ?></p></div>

    <form  id="formulaire"  class="row g-3" method="GET" action="" name="add">
        <div class="col-md-6">
            <label for="inputNom" class="form-label">Nom article</label>
            <input type="text" name="nom_article" class="form-control" id="nom_article">
            <div id="erreur-nom" class="text-danger"></div>
        </div>
        <div class="col-12">
            <label for="inputQuantite" class="form-label">Quantité</label>
            <input type="number"  name="quantite" class="form-control" id="inputQuantite">
            <div id="erreur-quantite" class="text-danger"></div>
        </div>
         <div class="col-md-6">
            <label for="inputMontant" class="form-label">Montant</label>
            <input type="number" name="montant_piece" class="form-control" id="inputMontant" >
            <span class="input-group-text">€</span>
            <div id="erreur-montant" class="text-danger"></div>
        </div>
        <div class="col-md-2">
            <select id="id_motif" class="form-select" aria-label="Default select example" name="id_motif" id="id_motif">
                <option selected>select motif </option>
                <div id="erreur-motif" class="text-danger"></div>

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
<script>
    valeur= document.getElementById('id_ret').innerHTML
    document.getElementById('id_retour').value=valeur;

    document.getElementById('formulaire').addEventListener('submit', function (e) {
            let valide = true;
            document.querySelector('#erreur-nom').innerHTML = '';
            document.querySelector('#erreur-quantite').innerHTML = '';
            document.querySelector('#erreur-montant').innerHTML = '';
            document.querySelector('#erreur-motif').innerHTML = '';
           

            const REGEX_NOM = /^[a-zA-Z]{2,50}$/;
            const REGEX_QUANTITE = /^([1-9]|[1-9][0-9]{1,3}|10000)(\.[0-9]+)?$/;
            const REGEX_MONTANT = /^(?:\p{Sc}\s*)?([1-9]\d*|0)(?:\.\d{1,2})?(?:\s*\p{Sc})?$/;
            
            

            

            if (!document.getElementById('nom_article').value.match(REGEX_NOM)) {
                valide = false;
                document.getElementById('erreur-nom').innerHTML = 'Le nom est obligatoire et doit contenir entre 2 et 50 lettres.';
            }

            if (!document.getElementById('inputQuantite').value.match(REGEX_QUANTITE)) {
                valide = false;
                document.getElementById('erreur-quantite').innerHTML = 'La quantité est obligatoire et doit être un nombre positif inférieur ou égal à 1000.';
            }

            if (!document.getElementById('inputMontant').value.match(REGEX_MONTANT)) {
                valide = false;
                document.getElementById('erreur-montant').innerHTML = "Le montant est invalide.";
            }

            if (!document.getElementById('id_motif').value) {
                valide = false;
                document.getElementById('erreur-motif').innerHTML = 'Le motif est obligatoire.';
            }

            if (!valide) {
                // permet de ne pas submit le formulaire si on utilise la fonction addEventListener
                e.preventDefault();
            }

            return valide;
        });

</script>
</body>
</html>