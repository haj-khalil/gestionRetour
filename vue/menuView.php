<section class="container my-10" style="margin-bottom: 50px;">
    <?php require_once('../vue/header.php'); ?>
</section>

<header class="container my-5">
    <?php require_once('../vue/header.php'); ?>
</header>

<div class="container ">
    <div class="row">
        <div class="col-6">
            <h1 class="titre">MémoRetour</h1>
            <div class="slogo">
                <h1>Application web de suivi </h1>
                <h1> des retours en ligne</h1>
            </div>
            <!-- icons pour admin -->
            <?php if ($isAdmin) : ?>
            <div class="container icons ">
                <div class="row">
                        <!--Retours  -->
                        <div class="col-3">
                            <a href="../controleur/retour.php" class="text-decoration-none text-dark">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">Retours</h5>
                                        <img src="../vue/style/menu.pngx" class="img-fluid" alt="" style="max-width: 20px; margin: 0 auto;"> <!-- Diminuer la taille des images -->
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!--Clients  -->
                        <div class="col-3">
                            <a href="../controleur/client.php" class="text-decoration-none text-dark">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">Clients</h5>
                                        <img src="../vue/style/client.pngx" class="img-fluid" alt="" style="max-width: 20px; margin: 0 auto;"> <!-- Diminuer la taille des images -->
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!--Paramètres  -->
                        <div class="col-3">
                            <a href="../controleur/gestion.php" class="text-decoration-none text-dark">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">Paramètres</h5>
                                        <img src="../vue/style/para.pngx" class="img-fluid" alt="" style="max-width: 20px; margin: 0 auto;"> <!-- Diminuer la taille des images -->
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!--Historiques  -->
                        <div class="col-3">
                            <a href="../controleur/histoire.php" class="text-decoration-none text-dark">
                                <div class="card text-center ">
                                    <div class="card-body">
                                        <h5 class="card-title">Historiques</h5>
                                        <img src="../vue/style/action.pngx" class="img-fluid" alt="" style="max-width: 20px; margin: 0 auto;"> <!-- Diminuer la taille des images -->
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                        <!--fin de partie Admin  -->
                        <!-- icons pour utilisatur -->
        
                    <?php if (!$isAdmin) : ?>
                        <div class="container icons ">
                            <div class="row">
                                <div class="col-6">
                                    <a href="../controleur/retour.php" class="text-decoration-none text-dark">
                                        <div style="margin-left: 40px;"  class="card text-center">
                                            <div class="card-body">
                                                <h4 class="card-title" >Retours</h4>
                                                <img src="../vue/style/menu.pngx" class="img-fluid" alt="" style="max-width: 20px; margin: 0 auto;"> <!-- Diminuer la taille des images -->
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="../controleur/editRetour.php" class="text-decoration-none text-dark">
                                        <div style="margin-left: 60px;"  class="card text-center">
                                            <div class="card-body">
                                                <h4 class="card-title"> Ajoutez </h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>          
                            </div>          
                        </div>          
                        <?php endif; ?>
                    </div>    
                    <?php if ($isAdmin) : ?>
                   <!--  <div class="container icons "> 
                        <div class="row">
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
                                        <h2 class="card-title">Montant en attente</h2>
                                        <p class="card-text"><?php echo $montantTotaleEnAttente . " €"; ?></p>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div> -->
    
                    <?php endif; ?>

            <!-- grand image -->
        <div class="col-6">
            <img src="../vue/style/colis.jpg" class="img-fluid" alt="" style="max-width: 700px; margin-top: 10%;"> 
        </div>
    </div>
</div>





    <footer class="footer mt-auto ml-1 text-light" style="width: 100%; height:5%">
        <span class="text-muted">© 2023 Tous droits réservés.</span>

    </footer>

    <style>
        body {
            background-image: url(../vue/style/back7.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        footer span {
            margin-left: 2%;
        }

        .icons {
            margin-top: 20px;
            
            margin-left: -256px;
            margin-top: 150px;

        }

        .card-body {
            height: 50px;
            background-color: rgba(25, 156, 255, 1);


        }

        .card-body:hover {
            height: 52px;
            background-image: linear-gradient(to right, rgba(187, 5, 150, 0.8), rgba(5, 101, 187, 0.8));


        }
        .card{
            width: 147px;
        }

        .titre {
            margin-top: 6%;
            margin-left: -25%;
            color: #219cee;
            font-family: "Times New Roman", Times, serif;
            font-size: 70px;
            font-weight: bold;

        }

        .slogo {
            color: orange;
            padding: 80px 0px 0px 40px;
            margin-left: -90%;
            text-align: center;

        }
        img {
  border-radius: 20% ;
}
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
