
<?php require_once('../vue/header.php'); ?>

<body>
    <form method="GET" action="../controleur/histoire.php" name="add">

        <section>
            <label></label>
            <h1>l'histoire</h1>

        </section>
         

        <section>
            <?php
            if (isset($lignes) && $lignes != []) : {
            ?>
                    <table border="1" class='table_salle'>
                        <tr>
                            <th>Numéro changement</th>
                            <th>user</th>
                            <th> time </th>
                            <th>table</th>
                            <th>action</th>
                            <th>detaille</th>

                        </tr>

                        <?php
                        foreach ($lignes as $ligne) {
                            echo $ligne; // tableau de lignes à créer dans /controleur/salles.php
                        }
                        ?>
                    </table>
                    



            <?php
                }
            else : echo "il n y a pas  des clients encore ";
            endif;
            ?>
            
        </section>
        
        <style>
            .article {
                background-color: blanchedalmond;
            }

            #img_x {
                width: 24px;
                height: 24px;
            }
        </style>
    </form> 
</body>

</html>
<?php require_once("../vue/footer.php") ?>
