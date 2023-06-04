<section class="container my-10" style="margin-bottom: 50px;">
  <?php require_once('../vue/header.php'); ?>
</section>

<body>

    <?php require_once('../vue/header.php'); ?>

    <section class="container my-5">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Numéro changement</th>
                        <th>Utilisateur</th>
                        <th>Temps</th>
                        <th>Table</th>
                        <th>Action</th>
                        <th>Détail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lignes as $ligne) : ?>
                        <tr>
                            <td><?php echo $ligne['numero_changement']; ?></td>
                            <td><?php echo $ligne['utilisateur']; ?></td>
                            <td><?php echo $ligne['temps']; ?></td>
                            <td><?php echo $ligne['table']; ?></td>
                            <td><?php echo $ligne['action']; ?></td>
                            <td><?php echo $ligne['detail']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php if (empty($lignes)) : ?>
            <p class="text-center">Historique vide !</p>
        <?php endif; ?>
    </section>

  <footer class="footer mt-auto bg-dark text-light" style="width: 100%; height:15%">
    <div class="container">
      <span class="text-muted">© 2023 Tous droits réservés.</span>
    </div>
  </footer>

    <!-- Inclure le script JavaScript de Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>
