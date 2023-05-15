<section class="container my -10" style=" margin-bottom: 50px;">
    <?php require_once('../vue/header.php'); ?>
</section>


<body>
    <section class="container mt-5">
        <h1 class="text-center mb-4">Liste des Clients</h1>
        <?php if(isset($lignes) && $lignes != []) : ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Numéro Client</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Retours</th>
                        <th>effacer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lignes as $ligne) : ?>
                        <?php echo $ligne; // tableau de lignes à créer dans /controleur/salles.php ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p class="text-center">Il n'y a pas de clients pour le moment.</p>
        <?php endif; ?>
    </section>

    <script src="../vue/style.js"></script>
</body>

<?php require_once('../vue/header.php'); ?>
