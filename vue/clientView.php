<section class="container my -10" style=" margin-bottom: 50px;">
    <?php require_once('../vue/header.php'); ?>
</section>


<body>
    <section class="container mt-5">
        <h1 class="text-center mb-4" >Liste des Clients</h1>
        <form class="d-flex" role="search">
            <div class="input-control">
                <input type="text" name="search" placeholder="Search.." class="form-control w-50 me-2" id="cherch">
                <div id="messageRecherch" style="display: none;" class="alert alert-danger w-50" role="alert">Pas de résultat !</div>
            </div>
        </form>


        <?php if (isset($lignes) && $lignes != []) : ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Numéro Client</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Etat</th>
                        <th>Retours</th>
                        <th>Desactiver block</th>
                        <th>Activer unBlock </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lignes as $ligne) : ?>
                        <?php echo $ligne; // tableau de lignes à créer dans /controleur/salles.php 
                        ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p class="text-center">Il n'y a pas de clients pour le moment.</p>
        <?php endif; ?>
    </section>


    <script src="../vue/style.js"></script>
    <script src="../vue/script.js"></script>
</body>
<style>
    .input-control {
        display: flex;
        align-items: center;
        background-color: #f2f2f2;
        border-radius: 20px;
        padding: 8px;
        width: 30%;

    }

    .input-control input[type="text"] {
        flex: 1;
        height: 30px;
        border: none;
        padding: 0 8px;
        font-size: 14px;
    }

    td {
        text-align: center;
    }

    th {
        text-align: center;
        vertical-align: middle;
    }

    body {

        background-image: url(../vue/style/back7.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }

    table {
        background-color: #f2f2f2;
        border-radius: 5px;
        margin-top: 10px;

    }
    .text-center{
        color: white;
        font-family: "Times New Roman", Times, serif;

    }
</style>
<?php require_once('../vue/footer.php'); ?>