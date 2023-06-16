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
            <?php if (!$isAdmin) : ?>
            <div class="container icons ">
                <div class="row">
                    <!--Statistic  -->
                    <div class="col-2"></div>
                    <div class="col-3">
                        <div class="col-md-6 montant">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h2 class="card-title">Montant Remboursé
                                    <p class="card-text"><?php echo $montantTotaleRembourse . " €"; ?></p></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-3">
                        <div class="col-md-6 montant">
                            <div class="card text-center">
                                <div class="card-body ">
                                    <h2 class="card-title">Montant en attente
                                    <p class="card-text"><?php echo $montantTotaleEnAttente . " €"; ?></p></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
            <?php endif; ?>
        </div>
            <!-- grand image -->
        <div class="col-6">
            <img src="../vue/style/colis.jpg" class="img-fluid" alt="" style="max-width: 700px; margin-top: 10%;"> 
        </div>
    </div>
</div>







    <style>
         html {
        overflow: scroll;
        overflow-x: hidden;
    }

    ::-webkit-scrollbar {
        width: 0px;
    }
        body {
            background-image: url(../vue/style/back7.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        footer span {
            margin-left: 2%;
        }

        .icons {
            
            margin-left: -256px;
            margin-top: 70px;

        }
        
        .card-body {
            height: 180px;
            background-image: linear-gradient(to right, rgba(187, 5, 150, 0.8), rgba(5, 101, 187, 0.8));
            border-radius: 5% ;
            
            font-family: "Times New Roman", Times, serif;
            
        }
        
        .card-text{
            margin-top: 5px;
            color: white;
            font-family: "Times New Roman", Times, serif;
            
            
        }
        .montant{
            border-radius: 10% ;
            background: none;
        }

        
        .card{
            width: 220px;
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
        .H-accueil{
            color: orange;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <?php require_once("../vue/footer.php") ?>
