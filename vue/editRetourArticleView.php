<?php require_once('../vue/header.php'); ?>

<body>

  <div class="container my-5">

    <section>
      <h1 class="mb-3"><?php echo $titre ?></h1>
    </section>

    <form name="add" action="editRetourArticle.php?op=a" method="post">

      <section class="mb-3">
        <div class="col-md-6">

          <?php 
          if($_SESSION['login'] === "root"){
          if (($editid_client)) { ?>
           <label for="id_client" class="form-label">Numéro Client :</label>
            <input id="id_client" name="id_client" type="text" class="form-control" size="5" maxlength="5" value="<?= htmlentities($valeurs['id_client']) ?>" />
            <br />
            <span class="text-danger"><?= ($erreurs['id_client']) ?></span>
          <?php } else { ?>
            <p class="form-control-static"><?= htmlentities($valeurs['id_client'] ?? '') ?></p>
          <?php } 
          } else{?>
        </div>
      </section>

      <section class="mb-3">
        <label for="id_ens" class="form-label">Enseignes:</label>
        <div class="col-md-6">
          <select class="form-select" aria-label="Default select example" name="id_ens" id="id_ens">
            <option></option>
            <?php foreach ($lignes as $ligne) {
              echo $ligne;
            } ?>
          </select>
        </div>
      </section>

      <section class="mb-3">
        <label for="select_id_statut" class="form-label">Statuts:</label>
        <div class="col-md-6">
          <select class="form-select" aria-label="Default select example" name="select_id_statut" id="select_id_statut">
            <option></option>
            <?php foreach ($rows as $row) {
              echo $row;
            } ?>
          </select>
        </div>
      </section>

      <section class="mb-3">
        <label for="date_achat" class="form-label">Date achat :</label>
        <div class="col-md-6">
          <input id="date_achat" name="date_achat" type="text" class="form-control" size="30" maxlength="30" value="<?= htmlentities($valeurs['date_achat'] ?? '') ?>" />
          <br />
          <span class="text-danger"><?= $erreurs['date_achat'] ?? '' ?></span>
        </div>
      </section>

      <section class="mb-3">
        <label for="date_envoi" class="form-label">Date envoie :</label>
        <div class="col-md-6">
          <input id="date_envoi" name="date_envoi" type="text" class="form-control" size="30" maxlength="30" value="<?= htmlentities($valeurs['date_envoi']) ?>" />
          <br />
          <span class="text-danger"><?= $erreurs['date_envoi'] ?></span>
        </div>
      </section>

      <section class="mb-3">
        <div class="col-md-6">
          <input type="submit" id="valider" name="valider" class="btn btn-primary" value="Valider" />
          &emsp;
          <input type="submit" id="annuler" name="annuler" class="btn btn-secondary" value="Annuler" />
        </div>
      </section>
<?php  }?>
    </form>

</body>

<?php require_once('../vue/footer.php'); ?>
