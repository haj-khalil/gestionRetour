<section class="container my -10" style=" margin-bottom: 50px;">
    <?php require_once('../vue/header.php'); ?>
</section>


<body>
    <section class="container mt-5">
        <h1 class="text-center mb-4">Liste des Clients</h1>
         <!-- hamid -->
         <form class="d-flex" role="search">
            <input class="form-control w-50 me-2" type="search" placeholder="Search" onfocus="notSouligne()" onchange="searchClient()" aria-label="Search" id="cherch">
            <button class="btn btn-outline-success" type="submit"> <a id="btn_search" href="">Search</a> </button>
            
            <div id="messageRecherch" style="display: none;"  class="alert alert-danger  w-50 " role="alert"> le mot que tu cherche n'existe pas ! </div>
        </form>
        <!-- hamid -->
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
                        <th>Effacer</th>
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
    <script>
            function searchClient() {
                document.getElementById('btn_search').href = ""
                let motCherche = "#"
                motCherche += document.getElementById('cherch').value.trim()
                document.getElementById('btn_search').href += motCherche.trim()

                let groupClass = document.getElementsByClassName(motCherche.substring(1))
                if(groupClass.length==0){
                    document.getElementById('messageRecherch').style.display="grid"

                }
                let lesCase = document.getElementsByTagName('td')
                for (let caseTable of groupClass) {
                    caseTable.style.backgroundColor = '#00FF7F'
                }

            }

            function notSouligne() {
                const lesCase = document.getElementsByTagName('td')
                for (let unCase of lesCase) {
                    unCase.style.backgroundColor = 'white'
                }
                document.getElementById('messageRecherch').style.display="none"
            }
        </script>

    <script src="../vue/style.js"></script>
</body>

<?php require_once('../vue/footer.php'); ?>
            