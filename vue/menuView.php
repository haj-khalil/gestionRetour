<!-- Inclure la feuille de style Bootstrap -->
<section class="container my -10" style=" margin-bottom: 100px;">
    <?php require_once('../vue/header.php'); ?>
</section>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <a href="../controleur/retourAdmin.php" class="text-decoration-none text-dark">
                    <div class="card text-center">
                        <div class="card-body">
                            <h2 class="card-title">Retours</h2>
                            <img src="../vue/style/menu.png" class="img-fluid" alt="">
                        </div>
                    </div>
                </a>
            </div>

            <?php if ($isAdmin) : { ?>
                    <div class="col">
                        <a href="../controleur/client.php" class="text-decoration-none text-dark">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h2 class="card-title">Clients</h2>
                                    <img src="../vue/style/client.png" class="img-fluid" alt="">
                                </div>
                            </div>
                        </a>
                    </div>

            <?php
                }
            endif; ?>

            <?php if (!$isAdmin) : { ?>
                    <div class="col">
                        <a href="../controleur/editRetourArticle.php" class="text-decoration-none text-dark">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h2 class="card-title">ajouter un Retour</h2>
                                    <img src="../vue/style/editer.png" class="img-fluid" alt="">
                                </div>
                            </div>
                        </a>
                    </div>
            <?php }
            endif; ?>

            <?php if ($isAdmin) : { ?>
                    <div class="col">
                        <a href="../controleur/gestion.php" class="text-decoration-none text-dark">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h2 class="card-title">paramétre</h2>
                                    <img src="../vue/style/para.png" class="img-fluid" alt="">
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col">
                        <a href="../controleur/histoire.php" class="text-decoration-none text-dark">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h2 class="card-title">l'Histoire</h2>
                                    <img src="../vue/style/action.png" class="img-fluid" alt="">
                                </div>
                            </div>
                        </a>
                    </div>
            <?php }
            endif; ?>
        </div>

        <?php if (!$isAdmin) : { ?>
                <div class="row mt-5">
                    <div class="col-md-6">
                        <div class="card text-center">
                            <div class="card-body">
                                <h2 class="card-title">Montant Remboursé</h2>
                                <p class="card-text"><?php echo $montantTotaleRembourse . " €"; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card text-center">
                            <div class="card-body">
                                <h2 class="card-title">Montant En Attente</h2>
                        <?php echo $montantTotaleEnAttente . " €"; ?>
                </div>
            </div>
        </div>

<?php }
endif; ?>
</body>

</html>

<?php require_once("../vue/footer.php") ?>
